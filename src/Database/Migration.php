<?php

namespace Azcend\Database;

use Azcend\Core\Database;
use Exception;

class Migration
{
    static function migrate(): void
    {
        echo "INFO> Migrating tables\n";
        $dir = __DIR__ . '/Migrations';
        if(!scandir($dir)) {
            echo "ERROR> Error while scanning ". $dir ." directory";
            return;
        }
        $files = array_diff(scandir($dir), array('..', '.'));
        if(!$files) {
            echo "ERROR> Error getting migration files";
            return;
        }

        $db= new Database();
        $sql =  "SHOW tables FROM ".$_ENV['MYSQL_DATABASE'];
        $stmt = $db->query($sql);
        $tables = $stmt->fetchAll();
        if(!isset($tables[0]))
            array_push($tables, []);

        if(in_array("migrations", $tables[0])) {
            try{
                $sql = "SELECT `file` from `migrations`";
                $stmt = $db->query($sql);
                $migrated = $stmt->fetchAll();
                $migrated_new = [];
                foreach ($migrated as $idx => $m) {
                    $migrated_new[$idx] = $m['file'];
                }
                $files = array_diff($files, $migrated_new);
            } catch (Exception $e) {
                echo "ERROR> ". $e . "\n";
            }
        }
        if (count($files) == 0) {
            echo "INFO> Nothing to migrate!\n";
        }

        foreach ($files as $file) {
            $fileName = $file;
            echo "INFO> Migrating file ". $fileName;
            $path = __DIR__ . "/Migrations/" . $file;
            $file = fopen($path, 'r');
            $sql = fread($file, filesize($path));

            $stmt = $db->query($sql);

            $sql = "INSERT INTO `migrations` (`file`, `failed`) VALUES (?, ?)";
            $db->insert($sql, [$fileName, 0]);
            echo "\t\tDone\n";
        }
    }
    static function new($name): string
    {
        $prefix = date('Y-m-d-H-s');
        $fileName = $prefix . '-' . $name . '.sql';
        $file = fopen('src/Database/Migrations/' . $fileName, 'w');
        fclose($file);
        return $fileName;
    }
}