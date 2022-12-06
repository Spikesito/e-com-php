<?php

namespace App\Model;

require_once __DIR__ . '/../../vendor/autoload.php';

require 'App/Model/Core.php';

use PDO;

class User extends \App\Model\Core\Core
// class Catalog

{

    public static function getUserByEmail($email)
    {
        $db = static::getDB();
        $stmt = $db->query("SELECT * FROM users WHERE Email = $email");
        return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
    }

    public static function emailUsed($email)
    {
        $db = static::getDB();
        $stmt = $db->query("SELECT * FROM users WHERE Email = '$email'");
        return (sizeof($stmt->fetchAll(PDO::FETCH_ASSOC)) == 0) ? false : true;
    }

    public static function loginMatch($email, $pw)
    {
        $db = static::getDB();
        $stmt = $db->query("SELECT * FROM users WHERE Email = '$email'");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (sizeof($result) == 0) {
            return "wrong login";
        }
        $user = $result[0];
        if ($email == $user['Email'] && $pw == $user['Password']) {
            return array('Id' => $user['UserId'], 'Name' => $user['FirstName'], 'Photo' => $user['PhotoId']);
        }
    }

    public static function createUser($data)
    {
        $FirstName = $data['FirstName'];
        $LastName = $data['LastName'];
        $Email = $data['Email'];
        $Password = $data['Password'];
        $BirthDate = $data['BirthDate'];
        $db = static::getDB();
        $stmt = $db->query("INSERT INTO users (FirstName, LastName, Email, Password, Phone, Birthdate, PhotoId)  VALUES ('$FirstName', '$LastName' , '$Email', '$Password',1-904-362-3285,'$BirthDate', 169794 )");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // public static function getId()
    // {
    //     $db = static::getDB();
    //     $stmt = $db->query("SELECT * FROM products; WHERE ProductId =");
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }
}
