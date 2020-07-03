<?php
class Model
{
    private static $DB_INSTANCE = null;

    public static function getDbInstance()
    {
        if (is_null(self::$DB_INSTANCE)) {
            self::$DB_INSTANCE = new PDO(
                "mysql:host=" . AppConfig::DB_HOST . ";dbname=" . AppConfig::DB_NAME,
                AppConfig::DB_USER,
                AppConfig::DB_PASSWORD
            );
            self::$DB_INSTANCE->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$DB_INSTANCE;
    }
}
