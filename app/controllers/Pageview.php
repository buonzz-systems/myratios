<?php

class Pageview{
	private $cache;

	public function __construct(){

		$this->cache = new Memcache();
		$this->cache->addServer('localhost', 11211);

	}

	public function get(){
		$v =  $this->cache->get('hits');
		
		if($v === FALSE)
			$this->cache->set('hits', 1);		
		else
			$this->cache->increment('hits', 1);

		return array("hits" => "success");
	}

	public function getHits(){
		$hits = $this->cache->get('hits');		
		return array("hits" => $hits);
	}
}