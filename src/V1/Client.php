<?php

namespace Pushover\V1;

use \Pushover\AbstractClient;

class Client extends AbstractClient {

	const API_ENDPOINT = 'https://api.pushover.net/1/messages.json';

	public function __construct($appToken, $userKey, $endpointUrl = self::API_ENDPOINT) {
		parent::__construct($appToken, $userKey, $endpointUrl);
	}


	/*
	Some optional parameters may be included:
		device - your user's device name to send the message directly to that device, rather than all of the user's devices
	title - your message's title, otherwise your app's name is used
	url - a supplementary URL to show with your message
	url_title - a title for your supplementary URL, otherwise just the URL is shown
	priority - send as -2 to generate no notification/alert, -1 to always send as a quiet notification, 1 to display as high-priority and bypass the user's quiet hours, or 2 to also require confirmation from the user
	timestamp - a Unix timestamp of your message's date and time to display to the user, rather than the time your message is received by our API
	sound - the name of one of the sounds supported by device clients to override the user's default sound choice
	 */

	/**
	 * Sends a notification event to Pushover.
	 *
	 * @param  string $message   The message to be sent
	 * @param  string $title     The title of the message
	 * @param  string $url       A URL to link the message to
	 * @param  string $urlTitle  A title for the linked URL
	 * @param  string $priority  A priority for the message
	 * @param  string $timestamp A
	 * @param  string $sound     [description]
	 * @param  string $device    [description]
	 * @return [type]            [description]
	 */
	public function notify($message, $title = null, $url = null, $urlTitle = null, $priority = null, $timestamp = null, $sound = null, $device = null) {

		$data = array(
			'message'   => $message,
			'title'     => $title,
			'device'    => $device,
			'url'       => $url,
			'url_title' => $urlTitle,
			'priority'  => $priority,
			'timestamp' => $timestamp,
			'sound'     => $sound
		);

		$data = array_filter($data);

		$data['token'] = $this->appToken;
		$data['user']  = $this->userKey;

		$options = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($data)
			)
		);

		$context  = stream_context_create($options);
		$result = file_get_contents($this->endpointUrl, false, $context);

		print_r($result);

	}

}