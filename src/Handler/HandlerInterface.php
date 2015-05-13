<?php

namespace SelectiveSync\Handler;

/**
 * HandlerInterface
 *
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
interface HandlerInterface
{
    /**
     * Sync an item to the destination. The item may be a file or a
     * directory.
     */
    public function syncItem($item);
}
