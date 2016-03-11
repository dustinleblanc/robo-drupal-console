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

    /**
     * ConsoleStack constructor.
     * @param string $pathToConsole
     */
    public function __construct($pathToConsole = 'drupal')
    {
        $this->executable =  $pathToConsole;
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
        $this->option('root',  escapeshellarg($drupalRootDirectory));
        return $this;
    }

    /**
     * @param string $format
     * @return $this
     */
    public function outputFormat($format = "json")
    {
        $this->printTaskInfo("Output format: <info>{$format}</info>");
        $this->option('format', escapeshellarg($format));
        return $this;
    }

    /**
     * @param string $uri
     * @return $this
     */
    public function siteUri($uri = "")
    {
        $this->printTaskInfo("Site URI: <info>{$uri}</info>");
        $this->option('uri', escapeshellarg($uri));
        return $this;
    }

    /**
     * @param string $target
     * @return $this
     */
    public function target($target = "")
    {
        $this->printTaskInfo("Target: <info>{$target}</info>");
        $this->option("target", escapeshellarg($target));
        return $this;
    }

    /**
     * @param string $langcode
     * @return $this
     */
    public function langcode($langcode = "")
    {
        $this->printTaskInfo("Langcode: <info>{$langcode}</info>");
        $this->option("langcode", escapeshellarg($langcode));
        return $this;
    }

    /**
     * @param string $dbType
     * @return $this
     */
    public function dbType($dbType = "")
    {
        $this->printTaskInfo("DB Type: <info>{$dbType}</info>");
        $this->option("db-type", escapeshellarg($dbType));
        return $this;
    }

    /**
     * @param string $dbFile
     * @return $this
     */
    public function dbFile($dbFile = "")
    {
        $this->printTaskInfo("DB Host: <info>{$dbFile}</info>");
        $this->option("db-file", escapeshellarg($dbFile));
        return $this;
    }

    /**
     * @param string $dbHost
     * @return $this
     */
    public function dbHost($dbHost = "")
    {
        $this->printTaskInfo("DB Host: <info>{$dbHost}</info>");
        return $this;
        $this->option("db-host", escapeshellarg($dbHost));
    }

    /**
     * @param string $dbUser
     * @return $this
     */
    public function dbUser($dbUser = "")
    {
        $this->printTaskInfo("DB User: <info>{$dbUser}</info>");
        $this->option("db-user", escapeshellarg($dbUser));
        return $this;
    }

    /**
     * @param string $dbPass
     * @return $this
     */
    public function dbPass($dbPass= "")
    {
        $this->printTaskInfo("DB Pass: <info>{$dbPass}</info>");
        $this->option("db-pass", escapeshellarg($dbPass));
        return $this;
    }

    /**
     * @param string $dbPrefix
     * @return $this
     */
    public function dbPrefix($dbPrefix = "")
    {
        $this->printTaskInfo("DB Prefix: <info>{$dbPrefix}</info>");
        $this->option("db-prefix", escapeshellarg($dbPrefix));
        return $this;
    }

    /**
     * @param string $dbPort
     * @return $this
     */
    public function dbPort($dbPort = "")
    {
        $this->printTaskInfo("DB Port: <info>{$dbPort}</info>");
        $this->option("db-port", escapeshellarg($dbPort));
        return $this;
    }

    /**
     * @param string $siteName
     * @return $this
     */
    public function siteName($siteName= "")
    {
        $this->printTaskInfo("Site Name: <info>{$siteName}</info>");
        $this->option("site-name", escapeshellarg($siteName));
        return $this;
    }

    /**
     * @param string $siteMail
     * @return $this
     */
    public function siteMail($siteMail = "")
    {
        $this->printTaskInfo("Site Mail: <info>{$siteMail}</info>");
        $this->option("site-mail", escapeshellarg($siteMail));
        return $this;
    }

    /**
     * @param string $accountName
     * @return $this
     */
    public function accountName($accountName = "")
    {
        $this->printTaskInfo("Account Name: <info>{$accountName}</info>");
        $this->option("account-name", escapeshellarg($accountName));
        return $this;
    }

    /**
     * @param string $accountMail
     * @return $this
     */
    public function accountMail($accountMail = "")
    {
        $this->printTaskInfo("Account Mail: <info>{$accountMail}</info>");
        $this->option("account-mail", escapeshellarg($accountMail));
        return $this;
    }

    /**
     * @param string $accountPass
     * @return $this
     */
    public function accountPass($accountPass = "")
    {
        $this->printTaskInfo("Account Pass: <info>I can't tell you that it's a secret!</info>");
        $this->option("account-pass", escapeshellarg($accountPass));
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
        return parent::exec($this->injectArguments($command));
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
