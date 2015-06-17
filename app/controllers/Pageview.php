<?php

use MyRatios\Memcached\PageviewRepository;

class Pageview{

	private $repository;

	public function __construct(){

		$this->repository = new PageviewRepository(); 
	
	}

	public function get(){		
	
		$this->repository->setOrIncrement('hits');

		$this->repository->setOrIncrement($_SERVER['REMOTE_ADDR']);

		$this->repository->addToList('ips', $_SERVER['REMOTE_ADDR']);

		$this->repository->addToList('user_agents', $_SERVER['HTTP_USER_AGENT']);

		if(strlen($_SERVER['HTTP_REFERER'])>0)
		{
			$this->repository->addToList('referers', $_SERVER['HTTP_REFERER']);
			
			$host = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);

			$this->repository->addToList('hosts', $host);
		}
		
		return array("hits" => "success");
	}

	public function getHits(){

		$hits = $this->repository->get('hits');
		$ips = $this->repository->get('ips');
		$referers = $this->repository->get('referers');
		$user_agents = $this->repository->get('user_agents');
		$hosts = $this->repository->get('hosts');

		return array("hits" => $hits, 
				'ips' => $ips,
				'referers' => $referers,
				'user_agents' => $user_agents,
				'hosts' => $hosts
				);
	}
}