<?php

class PageviewRepositoryTest extends PHPUnit_Framework_TestCase{	
  public function testIsThereAnySyntaxError(){
  	$var = new PageviewRepository();
  	$this->assertTrue(is_object($var));
  	unset($var);
  }  
}