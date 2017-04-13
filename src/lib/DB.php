<?php
namespace Lib\Lib;
class DB
{
    public static function getDB( $prefix ) {
        $db = null;
        try {
            $db = new \PDO(getenv($prefix."DB_DSN"), getenv($prefix."DB_USR"), getenv($prefix."DB_PWD"));
        }
        catch(PDOException $e) {
            $db = null;
            // Todo ... log this error
            if(getenv('mode') === 'development') echo 'ERREUR DB: ' . $e->getMessage();
        }
        return $db;
    }
}