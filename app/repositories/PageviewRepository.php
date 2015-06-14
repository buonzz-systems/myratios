<?php

class PageviewRepository{
	
	private $cache;

	public function __construct(){
		
		if(class_exists('Memcached'))
			$this->cache = new Memcached();
		else	
			$this->cache = new Memcache();
		
		$this->cache->addServer('localhost', 11211);

	}

	public function set($key,$value){
		return $this->cache->set($key,$value);
	}

	public function get($key){
		return $this->cache->get($key);
	}

	public function setOrIncrement($key){

		$value =  $this->cache->get($key);
		
		if($value === FALSE)
			$this->cache->set($key, 1);		
		else
			$this->cache->increment($key, 1);
	}

	public function addToList($listname, $value){

		$v =  $this->cache->get($listname);
		
		if($v === FALSE)
		{
			$mylist = array($value);
			$this->cache->set($listname, $mylist);		
		}
		elseif(!is_array($v)){
			$mylist = array($value);
			$this->cache->set($listname, $mylist);	
		}
		else
		{
			if(!in_array($value, $v))
			{
				$v[] = $value;
				$this->cache->set($listname, $v);
			}
		}	
	}
	
}