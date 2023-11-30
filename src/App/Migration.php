<?php

namespace Azcend\App;

use Exception;

class Migration
{
    static function migrate(): void
    {
        echo "INFO> Migrating tables<br>";
        $dir = __DIR__ . '/../Migrations';
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
            echo "ERROR> ". $e . "<br>";
        }

        foreach ($files as $file) {
            $fileName = $file;
            $path = __DIR__ . "/../Migrations/". $file;
            $file = fopen($path, 'r');
            $sql = fread($file, filesize($path));

            $stmt = $db->query($sql);

            $sql = "INSERT INTO `migrations` (`file`, `failed`) VALUES (?, ?)";
            $db->insert($sql, [$fileName, 0]);
        }
    }
    static function new($name): string
    {
        $prefix = date('Y-m-d-H-s');
        $fileName = $prefix . '-' . $name . '.sql';
        $file = fopen('src/Migrations/' . $fileName, 'w');
        fclose($file);
        return $fileName;
    }
}