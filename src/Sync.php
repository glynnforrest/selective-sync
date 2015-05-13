<?php

namespace SelectiveSync;

use SelectiveSync\Source\SourceInterface;
use SelectiveSync\Handler\HandlerInterface;

/**
 * Sync
 *
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class Sync
{
    public function __construct(SourceInterface $source, HandlerInterface $handler)
    {
        $this->source = $source;
        $this->handler = $handler;
    }

    public function sync()
    {
        while ($item = $this->source->getNextItem()) {
            $this->handler->syncItem($item);
        }
    }
}
