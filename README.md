# Pushover

This is a simple PHP wrapper for Pushover. At the heart is the Client object. It supports Pushover API v1.

```php
$client = new \Pushover\Client($appToken)
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

$priority = \Pushover\Priority::HIGH;
$sound    = \Pushover\Sound::PIANOBAR;
```