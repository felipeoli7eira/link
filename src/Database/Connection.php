<?php

namespace Source\Database;

use PDO;
use PDOException;

/**
 * Classe de conexão com o banco de dados.
 * 
 * @package Database
 * @author Felipe Oliveira <me.felipeoliveira@gmail.com>
*/
class Connection
{
    private static ?PDO $pdoInstance = null;

    private static array $pdoAttrParams = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_CASE               => PDO::CASE_NATURAL
    ];

    /** * @return PDO
    */
    public static function get(): PDO
    {
        try
        {
            if ( self::$pdoInstance === null ) {

                self::$pdoInstance = new PDO(
                    env('CONF_DB_DRIVER') . ':host=' . env('CONF_DB_HOST') . ';dbname=' . env('CONF_DB_NAME') . ';charset=utf8',
                    env('CONF_DB_ADMIN'),
                    env('CONF_DB_PASSWORD'),
                    self::$pdoAttrParams
                );
            }

            return self::$pdoInstance;
        }
        catch( PDOException $exception )
        {
            var_dump($exception);
            die();
        }
    }
}