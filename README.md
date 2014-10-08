# Pushover

This is a simple PHP wrapper for Pushover. At the heart is the Client object. It supports all versions of the Pushover API (currently only v1), and the namespaces are versioned accordingly.

```php
$client = new \Pushover\V1\Client($appToken)
$client->notify($userKey, "Hello user!");
```

Check the notify call for more advanced notifications.

```php
$client->notify(
	$userKey,
	$message,
	$title,
	$url,
	$urlTitle,
	$priority,
	$timestamp,
	$sound,
	$device
);
```

Both `$priority` and `$sound` have a set of constants available for ease of use.

```php

$priority = \Pushover\V1\Priority::HIGH;
$sound    = \Pushover\V1\Sound::PIANOBAR;
```