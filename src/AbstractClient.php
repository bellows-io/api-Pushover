<?php

namespace Pushover;

abstract class AbstractClient {

	protected $appToken;
	protected $endpointUrl;

	public function __construct($appToken, $endpointUrl) {
		$this->appToken      = $appToken;
		$this->endpointUrl = $endpointUrl;
	}

	public abstract function notify($userKey, $message);



}
