<?php
// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console
phpinfo();
require("php/provider.php");
require("php/classes/dataFactory.php");
echo $dbhost, $dbname, $dbuser, $dbpassword;
$factory = new DataFactory($provider);
$document = $factory->create('Document', $dbhost, $dbname, $dbuser, $dbpassword);
$html = $factory->create('Html', $dbhost, $dbname, $dbuser, $dbpassword);
var_dump($document, $html);
$home = file_get_contents("home.html");
echo $home;
?>
