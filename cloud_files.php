<?php

/**
* Rackspace Cloud Files PHP class
*
* @link 
* @version 0.0.1-dev
*/


define("DEFAULT_CF_API_VERSION", 1);
define("MAX_CONTAINER_NAME_LEN", 256);
define("MAX_OBJECT_NAME_LEN", 1024);
define("MAX_OBJECT_SIZE", 5*1024*1024*1024+1);
define("US_AUTHURL", "https://auth.api.rackspacecloud.com");
define("UK_AUTHURL", "https://lon.auth.api.rackspacecloud.com");


class cloud_files
{
    private static $username = null; // Rackspace Cloud username
    private static $apiKey = null; // Rackspace Cloud API Key
	private static $account = null; // Rackspace Cloud account
	
	public static $auth_host = US_AUTHURL; // Authentication server
	
	function __construct($username=NULL, $$apiKey=NULL, 

}