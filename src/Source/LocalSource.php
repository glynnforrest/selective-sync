<?php

namespace SelectiveSync\Source;

/**
 * LocalSource
 *
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class LocalSource implements SourceInterface
{
    protected $iterator;

    public function __construct($directory)
    {
        $this->iterator = new \FilesystemIterator($directory, \FilesystemIterator::SKIP_DOTS);

    }

    public function getNextItem()
    {
        $next = $this->iterator->getBasename();
        $this->iterator->next();
        return $next;
    }
}
