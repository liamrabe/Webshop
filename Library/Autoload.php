<?php
class Autoload {

	public const LIBRARY_PATH = BASE_DIR . '/Library';
	public const COMPOSER_VENDOR = BASE_DIR . '/vendor/autoload.php';

	protected static string $current_class;

	/* Static methods */

	/**
	 * @throws TypeError
	 */
	public static function register(): void {
		try {
			spl_autoload_register([__CLASS__, 'load']);

			if (!file_exists(self::COMPOSER_VENDOR)) {
				throw new TypeError('Vendor is not installed, run `composer install --no-dev` to install required packages');
			}

			require self::COMPOSER_VENDOR;
		}
		catch (TypeError $err) {
			echo $err->getMessage();
			exit;
		}
	}

	/**
	 * @param string $class_name
	 * @return bool
	 */
	public static function load(string $class_name): bool {
		self::$current_class = str_replace('\\', '/', $class_name);

		$class_path = self::getPath();
		if (!file_exists($class_path)) {
			return false;
		}

		require $class_path;
		return true;
	}

	/**
	 * @return string
	 */
	protected static function getPath(): string {
		return sprintf(
			'%s/%s.php',
			self::LIBRARY_PATH,
			self::$current_class
		);
	}

}