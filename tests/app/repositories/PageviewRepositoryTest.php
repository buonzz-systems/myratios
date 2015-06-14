<?php

class PageviewRepositoryTest extends PHPUnit_Framework_TestCase{	
  
  public function testIsThereAnySyntaxError(){
  	$repo = new PageviewRepository();
  	$this->assertTrue(is_object($repo));
  	unset($var);
  }

  public function testBasicSetGet(){
  	$repo = new PageviewRepository();
  	
  	$repo->set('test1', 1);
  	$v = $repo->get('test1');

  	$this->assertTrue($v == 1);
  	
  	unset($repo);
  		
  }

}