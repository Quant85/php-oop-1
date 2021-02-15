<?php
  
  class Person1 {
    public $name;
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }
  }

  $son1 = new Person1("Carlo Magno");
  $father1 = new Person1("Pipino il Breve");

  echo "<h2>Il padre di {$son1->getName()} è {$father1->getName()} </h2>"; 
  
  class Person2 {
    protected $name;
  }
  class Emperor extends Person2 {
    function setName($name) {
      $this->name = $name;
    }
  }
  $emperor = new Emperor();
  $emperor->setName("Carlo Magno");
  var_dump($emperor);
  //$emperor->name = "Carlo Magno"; // questo provoca un errore in quanto $name è protected e non public
  
  
  class Person3 {
    public $name;
    private $age;
    public function __construct(string $name,int $age)
    {
      $this->name = $name;
      $this->age = $age;
    }
    private function get_age(){
      return $this->age;
    }
    public function print_age(){
      return $this->get_age();
    }
    }
  $customer1 = new Person3("Carlo Magno",34);
  echo "<ul><li>Nome:  {$customer1->name}. </li>";
  echo "<li>Anni: {$customer1->print_age()}</li></ul>";
  echo "Anni: " . $customer1->age; // questo provoca un errore
?>
