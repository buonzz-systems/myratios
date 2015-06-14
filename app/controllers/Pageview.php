<?php

class Pageview{
	private $cache;

	public function __construct(){
		
		if(class_exists('Memcached'))
			this->cache = new Memcached();
		else	
			$this->cache = new Memcache();
		
		$this->cache->addServer('localhost', 11211);

	}

	public function get(){
		
		/*  raw hit counter */
		$v =  $this->cache->get('hits');
		
		if($v === FALSE)
			$this->cache->set('hits', 1);		
		else
			$this->cache->increment('hits', 1);

		/*  by ip  */
		$v =  $this->cache->get($_SERVER['REMOTE_ADDR']);
		
		if($v === FALSE)
			$this->cache->set($_SERVER['REMOTE_ADDR'], 1);		
		else
			$this->cache->increment($_SERVER['REMOTE_ADDR'], 1);


		/* store unique ips */
		$v =  $this->cache->get('unique_ips');
		if($v === FALSE)
		{
			$uniques = array($_SERVER['REMOTE_ADDR']);
			$this->cache->set('unique_ips', $uniques);		
		}
		else
		{
			if(!in_array($_SERVER['REMOTE_ADDR'], $v))
			{
				$v[] = $_SERVER['REMOTE_ADDR'];
				$this->cache->set($v, $uniques);
			}
		}


		return array("hits" => "success");
	}

	public function getHits(){
		$hits = $this->cache->get('hits');
		$unique_ips = $this->cache->get('unique_ips');

		return array("hits" => $hits, 'unique_ips' => $unique_ips);
	}
}