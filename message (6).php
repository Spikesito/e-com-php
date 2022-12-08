<?php
require 'vendor/autoload.php';

/* Ecrit dans une log dans le dossier courant
 *
 * @param string $page le nom de la page PHP
 * @return void
 */
// function logToDisk($page)
// {
// Horodatage
//   $date = new DateTime('now', new DateTimeZone('Europe/Paris'));
//   $laDate = $date->format("Y-m-d H:i:s.u");
//   $root = dirname(FILE); // Dossier courant
//   //$message = $laDate . ";" . $_SERVER['REMOTE_ADDR'] . ";" . $page . ";" . PHP_EOL;
//   $message = $laDate . ";" . get_ip() . ";" . $page . PHP_EOL;
//   $filename = $root . DIRECTORY_SEPARATOR . 'logs/log.txt';
//   file_put_contents($filename, $message, FILE_APPEND);
// }


/* Retourne une adresse IP
 *
 * @return void
 */
// function get_ip()
// {
//   $ip = $_SERVER['HTTP_CLIENT_IP']
//     ?? $_SERVER["HTTP_CF_CONNECTING_IP"] # when behind cloudflare
//     ?? $_SERVER['HTTP_X_FORWARDED']
//     ?? $_SERVER['HTTP_X_FORWARDED_FOR']
//     ?? $_SERVER['HTTP_FORWARDED']
//     ?? $_SERVER['HTTP_FORWARDED_FOR']
//     ?? $_SERVER['REMOTE_ADDR']
//     ?? '0.0.0.0';
//   return $ip;
// }




//FILL DATABASE functions

//Function Used to generate Random Float
function rand_float($st_num = 0, $end_num = 1, $mul = 1000000)
{
  if ($st_num > $end_num) return false;
  return mt_rand($st_num * $mul, $end_num * $mul) / $mul;
}




//Functions Used to generate each part of the DB

//create Customers
function createUsers($dbh, $faker, $nbUsersId)
{
  for ($i = 0; $i < $nbUsersId; $i++) {
    $sql = "insert into users (FirstName, LastName, Email, Password, Birthdate, Role) values (:FirstName, :LastName, :Email, :Password, :Birthdate, :Role)";
    try {
      $sth = $dbh->prepare($sql);
      $sth->execute(array(":FirstName" => $faker->firstName, ":LastName" => $faker->lastName, ":Email" => $faker->email, ":Password" => md5(random_int(1, 1000)), ":BirthDate" => $faker->date(), ":Role" => ""));
    } catch (PDOException $e) {
      die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
    }
  }
}
//ok

//Create All Product's categories
function createCategories($dbh, $categories)
{
  //Primary Key : CategoryId
  for ($i = 0; $i < sizeof($categories); $i++) {
    $sql = "insert into category (Name) values (:Name)";
    try {
      $sth = $dbh->prepare($sql);
      $sth->execute(array(":Name" => $categories[$i]));
    } catch (PDOException $e) {
      die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
    }
  }
}
//ok /// change names

//Insert One product
function createProduct($dbh, $faker, $nbCategoryId, $nb, $publishers)
{
  //Primary Key : ProductId
  for ($i = 1; $i <= $nb; $i++) {
    $sql = "insert into products (ProductName, Price, Quantity, Publishers, CategoryId, CreationDate, Description) values (:ProductName, :Price, :Quantity, :Publishers, :CategoryId, :CreationDate, :Description)";
    try {
      $sth = $dbh->prepare($sql);
      $sth->execute(array(":ProductName" => $faker->word, ":Price" => rand_float(1, 100), ":Quantity" => random_int(1, 100), ":Publishers" => $publishers[random_int(0, sizeof($publishers) - 1)], ":CategoryId" => random_int(1, $nbCategoryId), ":CreationDate" => $faker->date(), ":Description" => $faker->word));
    } catch (PDOException $e) {
      die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
    }
  }
}
//ok | once categories done  //// change publishers


//Create a photo Corresponding to a Product
function createPhotoP($dbh, $nbProductId)
{
  //Primary Key : PhotoId
  for ($i = 1; $i <= $nbProductId; $i++) {
    $sql = "insert into photoproduct (PhotoId, ProductId) values (:PhotoId, :ProductId)";
    try {
      $sth = $dbh->prepare($sql);
      $sth->execute(array(":PhotoId" => $i, ":ProductId" => $i));
    } catch (PDOException $e) {
      die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
    }
  }
}
//ok | once products done

//Create a photo Corresponding to a Customer
function createPhoto($dbh, $nbProductId)
{
  //Primary Key : PhotoId
  for ($i = 1; $i <= $nbProductId; $i++) {
    $sql = "insert into photos (Path, Width, Height) values (:Path, :Width, :Height)";
    try {
      $sth = $dbh->prepare($sql);
      $sth->execute(array(":PathId" => "https://picsum.photos/200", 300, 300));
    } catch (PDOException $e) {
      die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
    }
  }
}
//ok | once customers done

//Create a payment method
function createPaymentMethod($dbh, $faker, $nbUsersId)
{
  for ($i = 1; $i <= $nbUsersId; $i++) {
    $sql = "insert into payments (UserId, CreditCardNum, CCV, ExpirationDate, Owner) values (:UserId, :CreditCardNum, :CCV, :ExpirationDate, :Owner)";
    try {
      $sth = $dbh->prepare($sql);
      $sth->execute(array(":UserId" => $i, ":CreditCardNum" => $i, ":CCV" => random_int(100, 999), ":ExpirationDate" => $faker->creditCardExpirationDate->format('Y-m'), ":Owner" => $faker->name));
    } catch (PDOException $e) {
      die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
    }
  }
}
// to test | once customers done | to modify

//Create Addresses
function createAddresses($dbh, $faker, $nb)
{
  for ($i = 0; $i < $nb; $i++) {
    $sql = "insert into address (UserId, AddressName, City, Country, PostalCode, AddressOwner) values (:UserId, :AddressName, :City, :Country, :PostalCode, :AddressOwner)";
    try {
      $sth = $dbh->prepare($sql);
      $sth->execute(array(":UserId" => $i, ":AddressName" => $faker->streetName(), ":City" => $faker->city(), ":Country" => $faker->country(), ":PostalCode" => $faker->postcode(), ":AddressOwner" => $faker->lastName()));
    } catch (PDOException $e) {
      die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
    }
  }
}
//ok | before filling customer_address 

//   //Create a command
//   function createCommand($dbh, $nb)
//   {
//     for ($i = 1; $i <= $nb; $i++) {
//       $sql = "insert into command (CustomerId) values (:CustomerId)";
//       try {
//         $sth = $dbh->prepare($sql);
//         $sth->execute(array(":CustomerId" => $i));
//       } catch (PDOException $e) {
//         die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
//       }
//     }
//   }
//   // to test

//   //Create a command_product
//   function createCommandProduct($dbh, $nbProductId, $nbCommand)
//   {
//     for ($i = 1; $i < $nbCommand; $i++) {
//       $sql = "insert into command_product ( ProductId,CommandId, Quantity) values ( :ProductId, :CommandId, :Quantity )";
//       try {
//         $sth = $dbh->prepare($sql);
//         $sth->execute(array(":ProductId" => random_int(1, $nbProductId),  ":CommandId" => random_int(1, $nbCommand), ":Quantity" => random_int(1, 10)));
//       } catch (PDOException $e) {
//         die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
//       }
//     }
//   }
// not oké | once command and product done 

//   function createInvoices($dbh, $faker, $nbCustomerId, $nbProductId, $nb)
//   {
//     for ($i = 1; $i <= $nb; $i++) {
//       $sql = "insert into invoices (CustomerId, ProductId, InvoiceDate, CommandNumber,Quantity) values (:CustomerId, :ProductId, :InvoiceDate, :CommandNumber,:Quantity)";
//       try {
//         $sth = $dbh->prepare($sql);
//         $sth->execute(array(":CustomerId" => random_int(1, $nbCustomerId), ":ProductId" => random_int(1, $nbProductId), ":InvoiceDate" => $faker->date(), ":CommandNumber" => $faker->uuid(), ":Quantity" => random_int(1, 200)));
//       } catch (PDOException $e) {
//         die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
//       }
//     }
//   }
// not to test

//Create a command
//   function createRate($dbh, $faker, $nbCustomerId, $nbProductId, $nb)
//   {
//     for ($i = 0; $i < $nb; $i++) {
//       $sql = "insert into rate (CustomerId, ProductId, Rate,Text) values (:CustomerId, :ProductId, :Rate,:Text)";
//       try {
//         $sth = $dbh->prepare($sql);
//         $sth->execute(array(":CustomerId" => random_int(1, $nbCustomerId), "ProductId" => random_int(1, $nbProductId), ":Rate" => rand(0, 100) / 10, ":Text" => $faker->realText(200, 2)));
//       } catch (PDOException $e) {
//         die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
//       }
//     }
//   }
// to test

function fillDB()
{
  $publishers = ["Nike", "Adidas", "Rebook", "Puma", "Asics", "Balenciaga"];
  $categories = ["Running", "Football", "Lifestyle", "Skateboard"];

  $DBH = db_connect();
  $FAKER = Faker\Factory::create('fr_FR');
  $NB_USERS = random_int(1000, 3000); // customers must be higher than addresses
  $NB_ADDRESS = random_int(900, 1000);
  $NB_PRODUCT = 300;
  $NB_CATEGORY = sizeof($categories);
  // $NB_RATE = 3000;
  // $NB_COMMAND = $NB_USERS;
  // $NB_INVOICES = 3000;

  createCategories($DBH, $categories);
  createPhoto($DBH, $NB_PRODUCT);
  createProduct($DBH, $FAKER, $NB_CATEGORY, $NB_PRODUCT, $publishers);
  createUsers($DBH, $FAKER, $NB_USERS);
  createAddresses($DBH, $FAKER, $NB_ADDRESS);
  createPhotoP($DBH, $FAKER, $NB_PRODUCT);
  createPaymentMethod($DBH, $FAKER, $NB_USERS);


  // createCustomerAddresses($DBH, $NB_USERS);
  // createCard($DBH, $FAKER, $NB_USERS);

  // createRate($DBH, $FAKER, $NB_USERS, $NB_PRODUCT, $NB_RATE);
  // createCommand($DBH, $NB_USERS, $NB_COMMAND);
  // createCommandProduct($DBH, $NB_PRODUCT, $NB_COMMAND);
  // createInvoices($DBH, $FAKER, $NB_USERS, $NB_PRODUCT, $NB_INVOICES);
}
// }
