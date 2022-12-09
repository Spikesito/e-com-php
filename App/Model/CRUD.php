<?php

namespace App\Model;

// require_once __DIR__ . '/../../vendor/autoload.php';

// require 'App/Model/Core.php';

use PDO;

class Crud extends Core
// class Catalog

{
    function getFields($table): string
    {
        $db = static::getDB();
        $statement = $db->prepare("DESCRIBE $table");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_COLUMN);
        array_shift($result);
        // echo array_shift($result);
        return implode(', ', $result);
        // return "bite";
    }

    // function getValuesBy

    public function CrudData($method, $tableName, $strValues)
    {
        $db = static::getDB();
        $strFields = $this->getFields($tableName);
        switch ($method) {
            case 'C':
                echo "user ajouté" . $strValues;
                echo '\n' . $strFields;
                $stmt = $db->query("INSERT INTO $tableName ($strFields) VALUES ($strValues)");
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
                break;
            case 'R':

            case 'U':
            case 'D':
                $strValues = explode(',',$strValues);
                echo "DELETE FROM $tableName WHERE $strValues[0] = $strValues[1] AND $strValues[2] = $strValues[3]";
                $stmt = $db->query("DELETE FROM $tableName WHERE $strValues[0] = $strValues[1]");
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
                break;
        }
    }
}
