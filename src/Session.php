<?php
namespace Kanxpack;

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

	public static function destroy() : void
	{
		@session_destroy();
		return self::getInstance();
	}

	public static function name(?string $name = null) : string|false
	{
		return session_name($name);
	}
}
