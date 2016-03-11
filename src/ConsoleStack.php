<?php

namespace Pantheon\Robo\Task\DrupalConsole;

use Robo\Common\CommandArguments;
use Robo\Task\CommandStack;

/**
 * @property string pathToConsole
 */
class ConsoleStack extends CommandStack
{
    use CommandArguments;


    protected $pathToConsole;

    /**
     * ConsoleStack constructor.
     * @param string $pathToConsole
     */
    public function __construct($pathToConsole = 'drupal')
    {
        $this->pathToConsole = $pathToConsole;
    }


    /**
     * Set the Drupal root for this command stack.
     *
     * @param $drupalRootDirectory
     * @return $this
     */
    public function drupalRootDirectory($drupalRootDirectory)
    {
        $this->printTaskInfo('Drupal root: <info>' . $drupalRootDirectory . '</info>');
        $this->arg('--root', escapeshellarg($drupalRootDirectory));
        return $this;
    }

    /**
     * Run Console's site installer.
     * @return $this
     */
    public function siteInstall()
    {
        $this->printTaskInfo('Installing Drupal');
        return $this->exec('site:install');
    }

    /**
     * Execute an arbitrary Console command.
     *
     * @param $command
     * @return $this
     */
    public function exec($command)
    {
        if (is_array($command)) {
            $command = implode(' ', array_filter($command));
        }
        return parent::exec($this->injectArguments($command, $assumeYes));
    }


    /**
     * Appends arguments to the command.
     *
     * @param string $command
     *
     * @return string
     *    The modified command string.
     */
    protected function injectArguments($command)
    {
        return "{$command} {$this->arguments}";
    }
    /**
     * @return string
     */
    public function getPathToConsole()
    {
        return $this->pathToConsole;
    }

    /**
     * @param string $pathToConsole
     */
    public function setPathToConsole($pathToConsole)
    {
        $this->pathToConsole = $pathToConsole;
    }
}
