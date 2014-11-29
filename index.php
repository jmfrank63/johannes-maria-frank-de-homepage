<?php
// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console

require_once 'php/provider.php';
require_once 'vendor/autoload.php';

$factory = new DataFactory($provider);
$document = $factory->create('Document', $dbhost, $dbname, $dbuser, $dbpassword);
$html = $factory->create('Html', $dbhost, $dbname, $dbuser, $dbpassword);

$home = file_get_contents("home.html");
echo $home;
phpinfo();
?>
