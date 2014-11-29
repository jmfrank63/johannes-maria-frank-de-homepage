<?php
// creates a callback function to get access to the database dependent on its
// environment

// set database name


// check for environment we are running on
if (!strpos($_SERVER['HTTP_HOST'],'wbsproject-jmfrank63.c9.io')) {
  $dbname = 'c9';
  $host = getenv('IP');
  $dbuser = getenv('C9_USER');
  $dbpassword = '';
} elseif (!strpos($_SERVER['HTTP_HOST'],'johannes-maria-frank.de')) {
    $dbname = $_SERVER['RDS_DB_NAME'];
    $host = $_SERVER['RDS_HOSTNAME'];
    $dbuser = $_SERVER['RDS_USERNAME'];
    $dbpassword = $_SERVER['RDS_PASSWORD'];
} elseif (!strpos($_SERVER['HTTP_HOST'],'localhost')) {
    $dbname = 'wbsproject';
    $host = 'localhost';
    $dbuser = 'root';
    $dbpassword = '';
} else {
    die("Error unknown environment. Please provide necessary information in " . basename(__FILE__));
}

// create a callable returning the connection
$provider = function($host, $dbname, $dbuser, $dbpassword) {
  try {
    echo $host, $dbname, $dbuser, $dbpassword;
    $connection = new PDO('mysql:host='.$host.';dbname='.$dbname, $dbuser, $dbpassword );
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  } catch(PDOException $exp) {
      echo $exp->getMessage();
      die("Application terminated: No database connection.");
  }
  return $connection;
};



?>