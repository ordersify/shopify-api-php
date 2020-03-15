<?php

namespace Slince\Shopify;

use Psr\Http\Message\ResponseInterface;
use Slince\Shopify\Exception\RuntimeException;
use Slince\Shopify\Model\ModelInterface;
use Slince\Shopify\Service\Contracts\ManagerInterface;

class CursorBasedPagination
{
    const LINK_REGEX = '/<(.*page_info=([a-z0-9\-]+).*)>; rel="?{type}"?/i';

    /**
     * @var string
     */
    protected $resource;

    /**
     * @var array
     */
    protected $query;

    /**
     * @var ManagerInterface
     */
    protected $manager;

    /**
     * @var array
     */
    protected $links = [];

    public function __construct(ManagerInterface $manager, $resource, $query = [])
    {
        $this->manager = $manager;
        $this->resource = $resource;
        $this->query = $query;
    }

    /**
     * Gets the current page data.
     *
     * @param string $pageInfo
     * @return ModelInterface[]
     */
    public function current($pageInfo = null)
    {
        $client = $this->manager->getClient();
        $query = $this->query;
        if (null !== $pageInfo) {
            $query['page_info'] = $pageInfo;
        }
        $data = $client->get($this->resource, $query);

        $this->links = $this->extractHeaderLink($client->getLastResponse());
        return $this->manager->createMany(reset($data));
    }

    protected function extractHeaderLink(ResponseInterface $response)
    {
        if (!$response->hasHeader('Link')) {
            return [];
        }
        $links = [
            'next' => null,
            'previous' => null,
        ];
        foreach (array_keys($links) as $type) {
            $matched = preg_match(
                str_replace('{type}', $type, static::LINK_REGEX),
                $response->getHeader('Link')[0],
                $matches
            );
            if ($matched) {
                $links[$type] = $matches[2];
            }
        }

        return $links;
    }

    /**
     * Get the next page of data.
     *
     * @return ModelInterface[]
     */
    public function next()
    {
        if (!$this->hasNext()) {
            throw new RuntimeException("There's no next page");
        }

        return $this->current($this->links['next']);
    }

    /**
     * Checks whether has next page.
     *
     * @return bool
     */
    public function hasNext()
    {
        return !empty($this->links['next']);
    }

    /**
     * Gets the next page info.
     *
     * @return string|null
     */
    public function getNextPageInfo()
    {
        return $this->links['next'];
    }

    /**
     * Get the previous page of data.
     *
     * @return ModelInterface[]
     */
    public function prev()
    {
        if (!$this->hasPrev()) {
            throw new RuntimeException("There's no previous page");
        }

        return $this->current($this->links['previous']);
    }

    /**
     * Checks whether has previous page.
     *
     * @return bool
     */
    public function hasPrev()
    {
        return !empty($this->links['previous']);
    }

    /**
     * Gets the previous page info.
     *
     * @return string|null
     */
    public function getPrevPageInfo()
    {
        return $this->links['previous'];
    }
}
