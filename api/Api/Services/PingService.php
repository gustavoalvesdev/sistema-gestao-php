<?php 

namespace Api\Services;

class PingService
{
	public function get(): array
	{
		return ['pong' => true];
	}
}
