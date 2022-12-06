<?php
// LoginController.php

class LoginController {
  public function showLoginForm() {
    // load the login form view
    require_once('views/login.php');
  }

  public function login() {
    // authenticate the user and log them in
    $username = $_POST['username'];
    $password = $_POST['password'];

    // connect to the database
    $db = new Database();

    // check if the username and password are correct
    $result = $db->query("SELECT * FROM users WHERE username = ? AND password = ?", [$username, $password]);

    if ($result->num_rows > 0) {
      // the username and password are correct, log the user in
      $_SESSION['logged_in'] = true;
      $_SESSION['username'] = $username;
      // redirect to the home page
      header("Location: index.php");
    } else {
      // the username and password are incorrect, display an error message
      echo "Invalid username or password. Please try again.";
    }
  }
}

// RegisterController.php

class RegisterController {
  public function showRegistrationForm() {
    // load the registration form view
    require_once('views/register.php');
  }

  public function register() {
    // process the registration form and create a new user
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirmation = $_POST['password_confirmation'];

    // check if the password and password confirmation match
    if ($password != $passwordConfirmation) {
      echo "The password and password confirmation do not match. Please try again.";
      return;
    }

    // connect to the database
    $db = new Database();

    // check if the email is already in use
    $result = $db->query("SELECT * FROM users WHERE email = ?", [$email]);

    if ($result->num_rows > 0) {
      // the email is already in use, display an error message
      echo "The email address is already in use. Please use a different email address.";
      return;
    }

    // insert the new user into the database
    $db->query("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)", [$firstName, $lastName, $email, $password]);

    // redirect to the login page
    header("Location: index.php?page=login");
  }
}

// CatalogController.php

class CatalogController {
  public function showCatalog() {
    // load the catalog view and display the available products
    $db = new Database();
    $products = $db->query("SELECT * FROM products");

    require_once('views/catalog.php');
  }
}

// HomeController.php

class HomeController {
  public function showHomePage() {}
    // load the home page
  }