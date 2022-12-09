<?php

namespace App\Model;

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
        return implode(', ', $result);
    }

    function CrudData($method, $tableName, $strValues)
    {
        $db = static::getDB();
        $strFields = $this->getFields($tableName);
        switch ($method) {
            case 'C':
                echo "user ajouté";
                echo '\n';
                $stmt = $db->query("INSERT INTO $tableName ($strFields) VALUES ($strValues)");
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
                break;
            case 'R':
            case 'U':
                // $stmt = $db->prepare('UPDATE' . $tableName . 'SET id = ?, name = ?, email = ?, phone = ?, title = ?, created = ? WHERE id = ?');
                // $stmt->execute($strValues);
                // $msg = 'Updated Successfully!';
                // return $stmt->fetchAll(PDO::FETCH_ASSOC);
                // break;
            case 'D':
        }
    }

    // function updateValuesBy($tableName, array $values)
    // {
    //     $pdo = static::getDB();
    //     $msg = '';
    //     // Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
    //     if (isset($_GET['id'])) {
    //         if (!empty($_POST)) {
    //             // This part is similar to the create.php, but instead we update a record and not insert
    //             $id = isset($_POST['id']) ? $_POST['id'] : NULL;
    //             $name = isset($_POST['name']) ? $_POST['name'] : '';
    //             $email = isset($_POST['email']) ? $_POST['email'] : '';
    //             $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    //             $title = isset($_POST['title']) ? $_POST['title'] : '';
    //             $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
    //             // Update the record
    //             $stmt = $pdo->prepare('UPDATE users SET id = ?, name = ?, email = ?, phone = ?, title = ?, created = ? WHERE id = ?');
    //             $stmt->execute([$id, $name, $email, $phone, $title, $created, $_GET['id']]);
    //             $msg = 'Updated Successfully!';
    //         }
    //         // Get the contact from the contacts table
    //         $stmt = $pdo->prepare('SELECT * FROM contacts WHERE id = ?');
    //         $stmt->execute([$_GET['id']]);
    //         $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    //         if (!$contact) {
    //             exit('Contact doesn\'t exist with that ID!');
    //         }
    //     } else {
    //         exit('No ID specified!');
    //     }
    // }
}
