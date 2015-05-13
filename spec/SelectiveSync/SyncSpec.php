<?php

namespace spec\SelectiveSync;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SelectiveSync\Source\SourceInterface;
use SelectiveSync\Handler\HandlerInterface;

class SyncSpec extends ObjectBehavior
{
    function let(SourceInterface $source, HandlerInterface $handler)
    {
        $this->beConstructedWith($source, $handler);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('SelectiveSync\Sync');
    }
}
