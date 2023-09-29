<?php

namespace AriSALT\Logger;

use Monolog\Logger as MonologLogger;
use Monolog\Handler\RotatingFileHandler;

class Logger
{
	public static function logging(
		string $title,
		string $filename,
		mixed $message,
		string $type = 'INFO'
	) {
		$logger = new MonologLogger($title);
		$handler = new RotatingFileHandler(
			storage_path('logs/' . str_replace(' ', '-', strtolower($filename)) . '.log'),
			0,
			MonologLogger::INFO
		);

		$handler->setFilenameFormat('{filename}-{date}', 'Y-m-d');
		$logger->pushHandler($handler);

		switch ($type) {
			case 'INFO':
				$logger->info($message);

				break;
			case 'ERROR':
				$logger->error($message);

				break;
			default:
				$logger->notice($message);
		}
	}
}
