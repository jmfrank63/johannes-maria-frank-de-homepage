<?php
// database connection class
class DataFactory {
  protected $provider = null;
  protected $connection = null;

  // constructor
  public function __construct( callable $provider) {
    $this->provider = $provider;
  }

  // creates a new database connection instance
  public function create( $name, $dbhost, $dbname, $dbuser, $dbpassword) {
    if ( $this->connection === null ) {
      $this->connection = call_user_func_array( $this->provider, array($dbhost, $dbname, $dbuser, $dbpassword) );
    }
    return new $name( $this->connection );
  }
}

// document class
class Document {
  // constructor
  public function __construct( $connection ) {
    $this->connection = $connection;
  }
  
}

class Html {
  //constructor
  public function __construct( $connection ) {
    $this->connection = $connection;
  }
  
}
?>