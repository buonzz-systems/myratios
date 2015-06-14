<?php

class Welcome{
	public function get(){		
		return array("MyRatios" => "v1.0");
	}

	public function getFlush()
	{
		$memcache_obj = new Memcache;
		$memcache_obj->connect('memcache_host', 11211);

		$memcache_obj->flush();
		$memcache_obj->flush();
	}
}