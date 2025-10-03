<?php
namespace Kanxpack;

class SessionCookie {

	private static $instance;
	private static $lifetime = 300;
 	private static $path = '';
 	private static $domain = '';
 	private static $secure = false;
 	private static $httponly = false;

    public static function getInstance() 
    { 
    	return empty(self::$instance) ? (new self()) : self::$instance; 
    }

	public static function getParams(): array
	{
		return session_get_cookie_params();
	}

	public static function setParams(
	    int $lifetime,
	    ?string $path = null,
	    ?string $domain = null,
	    ?bool $secure = null,
	    ?bool $httponly = null
	): bool
	{
		self::lifetime($lifetime);
		self::path($path);
		self::domain($domain);
		self::secure($secure);
		self::httponly($httponly);

		return session_set_cookie_params(
			    self::getLifetime(),
				self::getPath(),
				self::getDomain(),
				self::getSecure(),
				self::getHttpOnly()
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
			self::getLifetime(),
			self::getPath(),
			self::getDomain(),
			self::getSecure(),
			self::getHttpOnly()
		);
		
		return self::getInstance();
	}

	public static function getLifetime() : int
	{
		return self::$lifetime;
	}

	public static function getPath() : ?string
	{
		return self::$path;
	}

	public static function getDomain() : ?string
	{
		return self::$domain;
	}

	public static function getSecure() : ?bool
	{
		return self::$secure;
	}

	public static function getHttpOnly() : ?bool
	{
		return self::$httponly;
	}

}
