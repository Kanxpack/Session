<?php
namespace Kanxpack;

require_once('SessionCache.php');

class Session {

	use SessionCache;

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

	//public static function cacheExpire(?int $value = null): int|false
	//{
	//	return self::expire($value);
	//}

	
}
