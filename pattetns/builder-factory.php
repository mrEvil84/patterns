<?php
namespace Patterns\BuilderFactory;

/**
 * Interface ILog
 * @package Patterns\BuilderFactory
 * @description Rozwiazuje problem gdy w przyszlosci bedzie potrzeba zmiany obslugi logowania np logi zamist do pliku chcemy pisac do bazy danych
 */
interface ILog
{
    public function doLog($message);
}

class DbLog implements ILog
{
    public function doLog($message) {
        echo 'db do log ' . $message;
    }
}

class TxtLog implements ILog
{
    public function doLog($message) {
        echo 'txt do log '.$message;
    }
}

class Log
{
    public static function load()
    {
        return new DbLog();
    }
}

class Simulate
{
    public static function execute()
    {
        $log = Log::load();
        $log->doLog('Aplikacja uruchomiona-test builder-factory');
    }
}
