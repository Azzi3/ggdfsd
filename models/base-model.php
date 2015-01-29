<?php

class BaseModel
{
  // Ska sättas till en instance av PDO
  public static $db;

  /**
   * Sätter valfri databas anslutning till self::$dbh
   */
  public static function setDbh($pdoDb) {
    self::$db = $pdoDb;
  }

  /**
   * Hämtar alla rader i databasen.
   *
   * @return array  Returnerar en array där varje object är en instans
   *                av PortfolioItem eller Category beroende på vilken klass den
   *                den kallades ifrån
   */
  public static function all() {
    // Sätter $class till namn på classen metoden kallas ifrån,
    // t.ex. PortfolioItem eller Category
    $class = get_called_class();
    // Hämtar tabelnamn
    // `const TABLE_NAME = 'exampleTabel'` ska vara definerat i klassen
    $table = $class::TABLE_NAME;

    // Förbereder mysql kommando
    $statement = self::$db->prepare("SELECT * FROM $table");
    // Exekverar mysql kommando
    $statement->execute(); 
    // Returnerar array där varje object är en instans av tex PortfolioItem
    return $statement->fetchAll(PDO::FETCH_CLASS, $class);
  }

  /**
   * Hittar enskild rad ifrån databasen baserat på id
   *
   * @param integer $id  Id på objectet vi vill hitta
   *
   * @return object       PortfolioItem eller Category beroende på vilken klass
   *                      som kallar på metoden
   */
  public static function find($id) {
    // Sätter $class till namn på classen metoden kallas ifrån
    $class = get_called_class();
    // Hämtar tabelnamn
    $table = $class::TABLE_NAME;

    // Förbereder mysql kommando
    $statement = self::$db->prepare("SELECT * FROM $table WHERE id=:id LIMIT 1");
    // Välj att vi vill skapa en ny klass instance av returnerat värde
    $statement->setFetchMode(PDO::FETCH_CLASS, $class);
    // Exekverar kommado och skickar med vilket id vi vill använda
    $statement->execute(array('id' => $id));

    // Returnerar första raden som ett object
    return $statement->fetch(PDO::FETCH_CLASS);
  }


}