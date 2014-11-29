<?php
// creates a callback function to get access to the database dependent on its
// environment

// check for environment we are running on
if (strpos($_SERVER['HTTP_HOST'],'wbsproject-jmfrank63.c9.io') !== false) {
  $dbname = 'c9';
  $dbhost = getenv('IP');
  $dbuser = getenv('C9_USER');
  $dbpassword = '';
} elseif (strpos($_SERVER['HTTP_HOST'],'johannes-maria-frank.de') !== false) {
    $dbname = $_SERVER['RDS_DB_NAME'];
    $dbhost = $_SERVER['RDS_HOSTNAME'];
    $dbuser = $_SERVER['RDS_USERNAME'];
    $dbpassword = $_SERVER['RDS_PASSWORD'];
} elseif (strpos($_SERVER['HTTP_HOST'],'localdbhost') !== false) {
    $dbname = 'wbsproject';
    $dbhost = 'localdbhost';
    $dbuser = 'root';
    $dbpassword = '';
} else {
    die("Error unknown environment. Please provide necessary information in " . basename(__FILE__));
}

// create a callable returning the connection
$provider = function($dbhost, $dbname, $dbuser, $dbpassword) {
  try {
    $dbstring = "mysql:host={$dbhost};dbname={$dbname}";
    $connection = new PDO($dbstring, $dbuser, $dbpassword );
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  } catch(PDOException $exp) {
      echo $exp->getMessage();
      die("Application terminated: No database connection.");
  }
  return $connection;
};
?>