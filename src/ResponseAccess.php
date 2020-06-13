<?php

namespace Slince\Shopify;

use ArrayAccess;

/**
 * Response data object for accessing.
 * @see https://github.com/osiset/Basic-Shopify-API/blob/master/src/Osiset/BasicShopifyAPI/ResponseAccess.php
 */
class ResponseAccess implements ArrayAccess
{
    /**
     * The response data.
     *
     * @var mixed
     */
    public $container;

    /**
     * Setup resource.
     *
     * @param mixed $data The data to use for source.
     */
    public function __construct($data)
    {
        $this->container = $data;
    }

    /**
     * Check if offset exists
     *
     * @param mixed $offset
     *
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Get the value by offset.
     *
     * @param mixed $offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->container[$offset];
    }

    /**
     * Set a value by offset.
     *
     * @param mixed $offset
     * @param mixed $value
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->container[$offset] = $value;
    }

    /**
     * Remove by offset.
     *
     * @param mixed $offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Check if key exists in data.
     *
     * @param string $key
     *
     * @return bool
     */
    public function __isset($key)
    {
        return isset($this->container[$key]);
    }

    /**
     * Allows for accessing the underlying array as an object.
     * $response->shop->name will forward to $response['shop']['name']
     *
     * @param string $key
     *
     * @return mixed
     */
    public function __get($key)
    {
        if (isset($this->container[$key]) && is_array($this->container[$key])) {
            return new static($this->container[$key]);
        }

        return $this->container[$key];
    }

    /**
     * Set to array.
     *
     * @param string $key
     * @param mixed $value
     *
     * @return void
     */
    public function __set($key, $value)
    {
        $this->container[$key] = $value;
    }

    /**
     * Check if errors are in response.
     *
     * @return bool
     */
    public function hasErrors()
    {
        return isset($this->container['errors']) || isset($this->container['error']);
    }

    /**
     * Get the errors.
     *
     * @return mixed
     */
    public function getErrors()
    {
        if (! $this->hasErrors()) {
            return;
        }

        return isset($this->container['errors']) ? $this->container['errors'] : $this->container['error'];
    }
}