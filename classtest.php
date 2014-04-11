<?php

class test {

  /*
    This text inside here is all a comment
  */

  // Normal one line comments

  # Other one line comments

  /**
  * The next function is used to declare a new variable
  *
  * @param string $stringvar1;
  * @return bool;
  */

  var $myfirstvar;           // Defaults to a public variable
  private $myfourthvar;      // Gettable and settable by: this class
  protected $mysecondvar;    // Gettable and settable by: this class / extended classes
  public $mythirdvar;        // Gettable and settable by: this class / extended classes / all other classes

  function __construct() {

    // Always public

    // This function will be called whenever you create a: new test();

    echo 'always echoed  :::::::: ';

    $this->methodtorunatstartup1();
    $this->methodtorunatstartup2();

  }

  private function methodtorunatstartup1() {
    echo '1111111';
  }

  private function methodtorunatstartup2() {
    echo '2222222';
  }

  public function mymethod() {

    $user = 'user=andrew&pass=123456&time=now';

    echo $user;

  }


    // $users = str_replace('e', 'a', explode('&', $user));
    // foreach ($users as $user)
    //     {
    //         $split = explode('=', $g);
    //         $oauth[$split[0]] = $split[1];
    //     }

      //
      // $string = "user=tobie&pass=123456&time=now";
      //
      // $exploded = explode('&', $string);
      //
      //
      //
      // echo $string

}

$mynewvar = new test();

$mynewvar->mymethod();

?>
