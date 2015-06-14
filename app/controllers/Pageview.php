<?php

class Pageview{

	private $repository;

	public function __construct(){

		$this->repository = new PageviewRepository(); 
	
	}

	public function get(){		
	
		$this->repository->setOrIncrement('hits');

		$this->repository->setOrIncrement($_SERVER['REMOTE_ADDR']);

		$this->repository->addToList('unique_ips', $_SERVER['REMOTE_ADDR']);

		return array("hits" => "success");
	}

	public function getHits(){

		$hits = $this->repository->get('hits');
		
		$unique_ips = $this->repository->get('unique_ips');

		return array("hits" => $hits, 'unique_ips' => $unique_ips);
	}
}