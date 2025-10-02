<?php
namespace Kanxpack;

class SessionCookie {

	private static $instance;
	private static $lifetime = 300;
 	private static $path = '';
 	private static $domain = '';
 	private static $secure = '';
 	private static $httponly = '';

    public static function getInstance() 
    { 
    	return empty(self::$instance) ? (new self()) : self::$instance; 
    }

	public static function getParams(): array
	{
		return session_get_cookie_params();
	}

	public static function setParams(
	    int $lifetime_or_options,
	    ?string $path = null,
	    ?string $domain = null,
	    ?bool $secure = null,
	    ?bool $httponly = null
	): bool
	{
		return session_set_cookie_params(
			    $lifetime_or_options,
			    $path,
			    $domain,
			    $secure,
			    $httponly
			);
	}

	public static function lifetime(int $lifetime) : self
	{
		self::$lifetime = $lifetime;
		return self::getInstance();
	}

	public static function path(?string $path = null) : self
	{
		self::$path = $path;
		return self::getInstance();
	}

	public static function domain(?string $domain = null) : self
	{
		self::$domain = $domain;
		return self::getInstance();
	}

	public static function secure(?bool $secure = null) : self
	{
		self::$secure = $secure;
		return self::getInstance();
	}

	public static function httponly(?bool $httponly) : self
	{
		self::$httponly = $httponly;
		return self::getInstance();
	}

	public static function set() : self
	{
		self::setParams(
			self::$lifetime,
			self::$path,
			self::$domain,
			self::$secure,
			self::$httponly
		);
		
		return self::getInstance();
	}

	public static function getLifetime() : int
	{
		return self::$lifetime;
	}

}
