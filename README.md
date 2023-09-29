# logger
A logger for Laravel/Lumen apps.

## Installation
```
$ composer require ari-salt/logger
```

## Usage
Register middlewares to the routes.
```php
use AriSALT\Logger\Logger;

try {
    ...
} catch (Exception $e) {
    Logger::logging($logTitle, $logFilename, $e->getMessage());
    ...
}
```