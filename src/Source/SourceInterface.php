<?php

namespace SelectiveSync\Source;

/**
 * SourceInterface
 *
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
interface SourceInterface
{
    /**
     * Get the next directory to sync. Return null when no more
     * directories are available to sync.
     *
     * @return string|null
     */
    public function getNextItem();
}
