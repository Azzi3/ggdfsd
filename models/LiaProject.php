<?php

class LiaProject extends BaseModel
{
  // Anger vad tabellen i databasen heter flör denna klass
  const TABLE_NAME = 'lia_project';

  // Skapar en variable för varje kolumn i databasen.
  public $id,
         $name,
         $description,
         $spots,
		 $company,
		 $estimated_time;

  public function __construct(array $attributes = null) {
    // Om ingen array skickades med och värdet är null så kör vi inte våran loop
    // för att sätta värden
    if ($attributes === null) return;

    // Loopar igenom arrayen som skickades med
    foreach ($attributes as $key => $value) {
      // Om $attributes är `array('id' => 1, 'title' => 'Hej');` så kommer $key
      // att vara id första gången och title andra gången
      $this->$key = $value;
    }
  }

  private static $url = '/public/views/projects';

  /**
   * Url där vi visar portfolio itemet för användaren
   *
   * @return string
   */
  public function url() {
    return "/public/views/projects.php?id=" . $this->id;
  }

  public static function indexUrl() {
    return self::$url;
  }
  
  /**
   * Url där jag som administratör redigerar portfolio itemet
   *
   * @return string
   */
  public function adminEditUrl() {
    return '/public/views/projects/edit.php?id=' . $this->id;
  }

  public function adminDeleteUrl() {
    return '/public/views/projects/delete.php?id=' . $this->id;
  }
  
  public function viewUserUrl() {
    return '/viewuser.php?id=' . $this->id;
  }

  /**
   * Sparar nuvarande portfolio item i databasen. Denna methoden är inte kapabel
   * att skapa en ny rad i databasen. Det behöver vi skapa en annan metod för.
   */
  public function save() {
    // Förbereder mysql kommando
    $statement = self::$db->prepare(
      "UPDATE ".self::TABLE_NAME." SET name=:name,
                                       description=:description,
                                       spots=:spots,
									   company=:company,
									   estimated_time=:estimated_time
                                       WHERE id=:id");
    // Exekverar mysql kommando
    $statement->execute(array('id' => $this->id,
                              'name' => $this->name,
                              'description' => $this->description,
                              'spots' => $this->spots,
							  'company' => $this->company,
							  'estimated_time' => $this->estimated_time
                             ));
  }

	public function delete()
	{
		$id_to_delete = $this->id;	
		$sql = "DELETE FROM `lia-project` WHERE `id` = :id_to_delete";
		$query = self::$db->prepare( $sql );
		$query->execute( array( ":id_to_delete" => $id_to_delete ) );		
	}
	private $category;
 	public function category() {
    	// Hämtar kategorin om den inte redan är satt till variablen
    	if (!isset($this->category)) 
		{
      	$this->category = Category::find($this->category_id);
    	}
		return $this->category;
  }
  
	public static function whereCategoryId($id) {
    // Förbereder SQL strängen
    $statement = self::$db->prepare("SELECT * FROM " . self::TABLE_NAME . "
                                      WHERE category_id=:category_id");
    // Kör SQL strängen
    $statement->execute(array('category_id' => $id));

    // Hämta varje rad som en instans av Users
    return $statement->fetchAll(PDO::FETCH_CLASS, 'LiaProject');
  }
}