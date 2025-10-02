<?php
namespace Kanxpack;

trait SessionCache {

	public static function cacheExpire(?int $value = null): int|false
	{
		return session_cache_expire($value);
	}

}
