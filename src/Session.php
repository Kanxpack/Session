<?php
namespace Kanxpack\Session;

class Session {

	public static function start(): void
	{
		@session_start();
		return self;
	}

}