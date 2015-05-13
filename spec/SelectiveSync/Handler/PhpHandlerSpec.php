<?php

namespace spec\SelectiveSync\Handler;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Temping\Temping;

class PhpHandlerSpec extends ObjectBehavior
{
    protected $temping;

    function let()
    {
        $this->temping = new Temping();
        $this->temping->createDirectory('source');
        $this->temping->createDirectory('target');
        $this->beConstructedWith($this->temping->getPathname('source'), $this->temping->getPathname('target'));
    }

    function letGo()
    {
        $this->temping->reset();
    }

    public function getMatchers()
    {
        return [
            'createFile' => function($subject, $file) {
                return $this->temping->exists('target/'.$file);
            }
        ];
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('SelectiveSync\Handler\PhpHandler');
    }

    function it_should_be_a_handler()
    {
        $this->shouldHaveType('SelectiveSync\Handler\HandlerInterface');
    }

    function it_should_copy_a_single_file()
    {
        $this->temping->create('source/foo.txt');
        $this->syncItem('foo.txt')->shouldCreateFile('foo.txt');
    }

    function it_should_copy_multiple_files()
    {
        $this->temping->create('source/foo.txt');
        $this->temping->create('source/bar.txt');
        $this->syncItem('foo.txt')->shouldCreateFile('foo.txt');
        $this->syncItem('bar.txt')->shouldCreateFile('bar.txt');
    }
}
