<?php namespace MyRatios\Repositories\Redis;

class PageviewRepository{
	
	private $cache;

	public function __construct(){
			$this->cache = new Predis\Client();		
	}

	public function set($key,$value){
		return $this->cache->set($key,$value);
	}	
}