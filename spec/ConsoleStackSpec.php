<?php

namespace spec\Pantheon\Robo\Task\DrupalConsole;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ConsoleStackSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Pantheon\Robo\Task\DrupalConsole\ConsoleStack');
    }
}
