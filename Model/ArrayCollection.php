<?php

namespace IMAG\EtherpadBundle\Model;

class ArrayCollection implements \Iterator, \ArrayAccess
{
    /**
     * An array containing the entries of this collection.
     *
     * @var array
     */
    private $_elements;

    public function __construct(array $elements = array())
    {
        $this->_elements = $elements;
    }

    public function get($key)
    {
        if (isset($this->_elements[$key])) {
            return $this->_elements[$key];
        }
        return null;
    }
 

    public function set($key, $value)
    {
        $this->_elements[$key] = $value;
    }
 

    public function add($value)
    {
        $this->_elements[] = $value;
        return true;
    }

    public function contains($element)
    {
        foreach ($this->_elements as $collectionElement) {
            if ($element === $collectionElement) {
                return true;
            }
        }
 
        return false;
    }

    public function containsKey($key)
    {
        return isset($this->_elements[$key]);
    }

    public function count()
    {
        return count($this->_elements);
    }

    public function remove($key)
    {
        if (isset($this->_elements[$key])) {
            $removed = $this->_elements[$key];
            unset($this->_elements[$key]);
 
            return $removed;
        }
 
        return null;
    }

    public function toArray()
    {
        return $this->_elements;
    }
    /**
     * inherit \Iterator
     */
    public function current()
    {
        return current($this->_elements);
    }

    /**
     * inherit \Iterator
     */
    public function key()
    {
        return key($this->_elements);
    }

    /**
     * inherit \Iterator
     */
    public function next()
    {
        return next($this->_elements);
    }

    /**
     * inherit \Iterator
     */
    public function rewind()
    {
        return reset($this->_elements);
    }

    /**
     * inherit \Iterator
     */
    public function valid()
    {
        return isset($this->_elements[$this->key()]);
    }

    /**
     * inherit \ArrayAccess
     */
    public function offsetSet($offset, $value)
    {
        if (null === $offset) {
            return $this->add($value);
        }

        return $this->set($offset, $value);
    }

    /**
     * inherit \ArrayAccess
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * inherit \ArrayAccess
     */
    public function offsetExists($offset)
    {
        return $this->containsKey($offset);
    }

    /**
     * inherit \ArrayAccess
     */
    public function offsetUnset($offset)
    {
        return $this->remove($offset);
    }
}