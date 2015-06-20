<?php

use Luracast\Restler\RestException;

class Pageviews{

	private $resource_name = 'pageviews';
	private $redis;

	public function __construct(){
		$this->redis = new Predis\Client();
	}

	/**
	*  Pageviews Collection Resource.
	* 
	*  This is the listings of  pageviews of the surfer to any web sites you are tracking.
	*
	*  @return mixed
	*/
	public function index(){
		$raw = $this->redis->lrange($this->resource_name, 0, -1);
		$output = array();
		foreach($raw as $r)
		{
			$output[] = unserialize($r);
		}
		return $output;
	}

	/**
	*  Get a pageview Instance Resource.
	* 
	*  This is the inidividual pageviews entry specified by id.
	*
	*  @param string $id the unique id of the pageview
	*
	*  @return json
	*/
	public function get($id){		
		throw new RestException(400, "Individual pageview items cannnot be retrieved");
	}

	/**
	*   Record new Pageview.
	*   
	*   this is the method to call when you need to record a new pageview hit.
	*
	*   @url POST   
	*	@url GET  hit
	*
	*   @param string $accountid account id of this pageview 
	*   @param string $networkid the network on which things belongs into
	*   @param string $siteid site on which this pageview belongs
	*   @param string $tourid what tour this is from
	*/
	public function post($accountid = NULL, $networkid = NULL, $siteid = NULL, $tourid = NULL){		
		$params = array('accountid' => $accountid,
						'networkid' => $networkid,
						'siteid' => $siteid,
						'tourid' => $tourid,
						'ip'=> $_SERVER['REMOTE_ADDR'],
						'user_agent' => $_SERVER['HTTP_USER_AGENT']);


		if(strlen($_SERVER['HTTP_REFERER'])>0)
		{
			$params['referer']  = $_SERVER['HTTP_REFERER'];
			$params['host'] =  parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
		}


		return $this->redis->rpush($this->resource_name, serialize($params));

	}


	/**
	*   Update a  Pageview.
	*   
	*   this is the method to call when you need to update a pageview hit.
	*
	*   @param string $id of this pageview 
	*   @param string $request_data the updated data
	*/
	public function put($id, $request_data = NULL)
    {
    	throw new RestException(400, "Updating of Pageview is not allowed");
    }

    /**
	*   Delete a  Pageview.
	*   
	*   this is the method to call when you need to delete a pageview hit.
	*
	*   @param string $id of this pageview
	*/
    public function delete($id)
    {
    	throw new RestException(400, "Deletion of Pageview is not allowed");
    }
}