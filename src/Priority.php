<?php

namespace PushoverV1;

abstract class Priority {

	/**
	 * Generate no alert or sound
	 */
	const NOALERT = -2;

	/**
	 * Always send as a quiet notification
	 */
	const QUIET = -1;

	/**
	 * Notify and play sound
	 */
	const NORMAL = 0;

	/**
	 * Bypass user's quiet hours, display has high priority
	 */
	const HIGH = 1;

	/**
	 * Behave as high priority, but also require user confirmation
	 *
	 * Not currently supported
	 */
	//const EMERGENCY = 2;

}