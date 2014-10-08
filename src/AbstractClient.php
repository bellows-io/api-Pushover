<?php

abstract class AbstractClient {

	protected $appToken;
	protected $userKey;
	protected $endpointUrl;

	public function __construct($appToken, $userKey, $endpointUrl) {
		$this->appToken      = $appToken;
		$this->userKey     = $userKey;
		$this->endpointUrl = $endpointUrl;
	}

	public function notify($message);



}
