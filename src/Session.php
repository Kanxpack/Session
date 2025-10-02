<?php
namespace Kanxpack;

require_once('SessionCache.php');

class Session {

	protected static $sessionPrefix = "";

	public static function getInstance() : static
	{
		return new static();
	}

	public static function start() : self
	{
		@session_start();
		return self::getInstance();
	}

	public static function id() : string
	{
		return session_id();
	}

	public static function createId(string $prefix = "") : string
	{
		self::$sessionPrefix = $prefix;
		@session_create_id(self::$sessionPrefix);
		return self::getInstance();
	}

	public static function prefix() : string
	{
		return self::$sessionPrefix;
	}

	public static function destroy() : self
	{
		@session_destroy();
		return self::getInstance();
	}

	public static function name(?string $name = null) : string|false
	{
		return session_name($name);
	}

	public static function abort() : self
	{
		@session_abort();
		return self::getInstance();
	}

	public static function commit() : self
	{
		@session_write_close();
		return self::getInstance();
	}

	public static function writeClose() : self
	{
		self::commit();
		return self::getInstance();
	}

	public static function decode(string $data) : bool
	{
		return @session_decode($data);
	}

	public static function session_encode() : string|false
	{
		return @session_encode();
	}

	public static function garbageCollection() : int|false
	{
		return @session_gc();
	}

	public static function getCookieParameters() : array
	{
		return @session_get_cookie_params();
	}

	public static function cache() : SessionCache
	{
		return SessionCache::getInstance();
	}

}
