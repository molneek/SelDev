<?php

namespace Controllers;

/**
 * Class LoggerAdapter loads config from PathToLoggers file
 *     and creates new object to working with chosen logger.
 *
 * @package Spet\Logger
 */
class LoggerController
{
    /**
     * @var string $logger.
     */
    private $logger;
    /**
     * @var string $loggerName.
     */
    private $loggerName;
    /**
     * @var null|PDO $dbh.
     */
    private $dbh;

    /**
     * Getting path to file for logging.
     */
    public function __construct($loggerName, $dbh = null)
    {
        $this->loggerName = $loggerName;
        $this->dbh = $dbh;
    }

    /**
     * Connect to logger and return it.
     */
    public function getLogger()
    {
        return $this->logger = new $this->loggerName($this->dbh);
    }
}