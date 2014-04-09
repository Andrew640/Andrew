<?php

class Person {

private $firstname;
private $lastname;


  function __construct($first, $last) {

    $this->firstname = $this->cleanName($first);
    $this->lastname = $this->cleanName($last);

  }

  function setFirstname($value) {

    $this->firstname = $this->cleanName($value);

  }

  function setLastname($value) {

    $this->lastname = $this->cleanName($value);

  }

  function echoouttoscreen() {

    $tempstring = uniqid();

    echo "This person class is for {$this->firstname} with random id {$tempstring}";

    print_r($this);

  }

  private function cleanName($value) {

    // $value = str_replace('!', '', $value);
    $value = preg_replace('/\W*/', '', $value);

    $value = strtolower($value);
    $value = ucwords($value);

    return $value;

  }

}

$person1 = new Person('aND!!!!?><|":}{}"!!@£$%^&*(REW', 'thomas');
// $person2 = new Person('tobie', 'morgan hitchcock');
// $person3 = new Person('ingrid', 'morgan');

$person1->echoouttoscreen();
// $person2->echoouttoscreen();
// $person3->echoouttoscreen();

$person1->setFirstname('JoHn');

$person1->echoouttoscreen();

?>
