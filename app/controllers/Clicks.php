<?php

class Clicks{

	private $resource_name = 'pageviews';

	/**
	*  Pageviews Collection Resource.
	* 
	*  This is the listings of  pageviews of the surfer to any web sites you are tracking.
	*
	*  @return mixed
	*/
	public function index(){

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
	
	}

	/**
	*   Record new Pageview.
	*   
	*   this is the method to call when you need to record a new pageview hit.
	*
	*   @param string $accountid account id of this pageview 
	*   @param string $networkid the network on which things belongs into
	*   @param string $siteid site on which this pageview belongs
	*   @param string $tourid what tour this is from
	*/
	public function post($accountid = NULL, $networkid = NULL, $siteid = NULL, $tourid = NULL){		
	
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

    }
}