<?php

Namespace MyApp\Service;

use PDO;
use PDOException;

/**
 * Class Database
 */
class Database {

    /**
     * @var PDO
     */
    private static $instance;

    /**
     * @var string
     */
    private static $dsn = DB_DRIVER . ":host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME;

    /**
     * Private Construct for Singleton Pattern
     */
    private function __construct() {}

    /**
     * Get Database Connection
     * @return PDO
     */
    public static function getConnection() {
        if (!isset(self::$instance)) {

            try {

                self::$instance = new PDO(self::$dsn, DB_USER, DB_PASSWORD, array(
                    'PDO::ATTR_ERRMODE' => 'PDO::ERRMODE_EXCEPTION',
                    'PDO::ATTR_ORACLE_NULLS' => 'PDO::NULL_EMPTY_STRING'
                ));

            } catch (PDOException $e) {
                $e->getMessage();
            }

        }

        return self::$instance;
    }

}

?>
