<?php

namespace Pantheon\Robo\Task\DrupalConsole;

trait loadTasks
{
    /**
     * @param string $pathToConsole
     * @return ConsoleStack
     */
    protected function taskConsoleStack($pathToConsole = 'drupal')
    {
        return new ConsoleStack($pathToConsole);
    }
}