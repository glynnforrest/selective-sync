<?php

namespace spec\SelectiveSync\Source;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Temping\Temping;

class LocalSourceSpec extends ObjectBehavior
{
    protected $temping;

    function let()
    {
        $this->temping = new Temping();
        $this->beConstructedWith($this->temping->getDirectory());
    }

    function letGo()
    {
        $this->temping->reset();
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('SelectiveSync\Source\LocalSource');
    }

    function it_is_a_source()
    {
        $this->shouldHaveType('SelectiveSync\Source\SourceInterface');
    }

    function it_should_get_a_single_file_from_a_directory()
    {
        $this->temping->create('foo.txt');
        $this->getNextItem()->shouldReturn('foo.txt');
    }

    function it_should_get_multiple_files_from_a_directory()
    {
        $this->temping->create('bar.txt');
        $this->temping->create('foo.txt');
        $this->getNextItem()->shouldReturn('bar.txt');
        $this->getNextItem()->shouldReturn('foo.txt');
    }

    function it_should_get_a_single_directory_from_a_directory()
    {
        $this->temping->createDirectory('foo');
        $this->getNextItem()->shouldReturn('foo');
    }

    function it_should_get_multiple_directories_from_a_directory()
    {
        $this->temping->createDirectory('bar');
        $this->temping->createDirectory('foo');
        $this->getNextItem()->shouldReturn('bar');
        $this->getNextItem()->shouldReturn('foo');
    }
}
