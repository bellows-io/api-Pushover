<?php

namespace Pushover\V1;

use \Pushover\AbstractClient;

class Client extends AbstractClient {

	const API_ENDPOINT = 'https://api.pushover.net/1/messages.json';

	public function __construct($appToken, $endpointUrl = self::API_ENDPOINT) {
		parent::__construct($appToken, $endpointUrl);
	}

	/**
	 * Sends a notification event to Pushover.
	 *
	 * @param  string $userKey   The unique ID of the user to send to
	 * @param  string $message   The message to be sent
	 * @param  string $title     The title of the message
	 * @param  string $url       A URL to link the message to
	 * @param  string $urlTitle  A title for the linked URL
	 * @param  string $priority  A priority for the message
	 * @param  string $timestamp a Unix timestamp of your message's date and time to display to the user, rather than the time your message is received by our API
	 * @param  string $sound     the name of one of the sounds supported by device clients to override the user's default sound choice
	 * @param  string $device    your user's device name to send the message directly to that device, rather than all of the user's devices
	 * @return boolean           Whether or not the notification was successful
	 */
	public function notify($userKey, $message, $title = null, $url = null, $urlTitle = null, $priority = null, $timestamp = null, $sound = null, $device = null) {

		$data = array(
			'user'      => $userKey,
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

		$options = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($data)
			)
		);

		$context  = stream_context_create($options);
		$result = @file_get_contents($this->endpointUrl, false, $context);

		if (! $result) {
			return false;
		}
		$response = json_decode($result, true);
		if ($response && ! empty($response['status'])) {
			return true;
		}
		return false;
	}

}