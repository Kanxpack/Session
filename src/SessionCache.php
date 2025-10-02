<?php
namespace Kanxpack;

class SessionCache {

	private static $instance;
    
    public static function getInstance(){ return empty(self::$instance)?(new self()):self::$instance; }

	public static function expire(?int $value = null): int|false
	{
		return session_cache_expire($value);
	}

	public static function limiter(?string $value = null): string|false
	{
		return session_cache_limiter($value);
	}

}
