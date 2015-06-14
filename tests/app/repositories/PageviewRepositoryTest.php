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

  public function testSetOrIncrement(){
  
  	$repo = new PageviewRepository();
  	
  	$key = 'test'. rand(100,10000);
  	
  	$repo->setOrIncrement($key);

  	$v = $repo->get($key);

  	$this->assertTrue($v == 1);
  
  }

   public function testAddToList(){
  
  	$repo = new PageviewRepository();
  	
  	$key = 'list'. rand(100,10000);
  	
  	$repo->addToList($key, 'item1');
  	$repo->addToList($key, 'item2');

  	$v = $repo->get($key);

  	$this->assertTrue($v[0] == 'item1');
  	$this->assertTrue($v[1] == 'item2');
  
  }


}