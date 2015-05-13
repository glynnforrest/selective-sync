<?php

namespace SelectiveSync\Handler;

/**
 * PhpHandler
 *
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class PhpHandler implements HandlerInterface
{
    protected $sourceDirectory;
    protected $targetDirectory;

    public function __construct($sourceDirectory, $targetDirectory)
    {
        $this->sourceDirectory = rtrim($sourceDirectory, '/').'/';
        $this->targetDirectory = rtrim($targetDirectory, '/').'/';
    }

    public function syncItem($item)
    {
        copy($this->sourceDirectory.$item, $this->targetDirectory.$item);
    }
}
