<?php
namespace Controller;

abstract class BaseController {

	public const HEADER = [
		'xml' => 'text/xml',
		'json' => 'application/json',
	];

	/* Static methods */

	/**
	 * @param string $header
	 * @param string|int|float $value
	 */
	public static function setHeader(string $header, string|int|float $value): void {
		header(sprintf('%s %s', $header, $value));
	}

	/**
	 * @param string $content_type
	 */
	public static function setContentType(string $content_type): void {
		self::setHeader('Content-Type', self::HEADER[$content_type]);
	}

	/**
	 * @param int $status
	 */
	public static function setStatus(int $status): void {
		http_response_code($status);
	}

	/**
	 * @return int
	 */
	public static function getStatus(): int {
		return http_response_code();
	}

}