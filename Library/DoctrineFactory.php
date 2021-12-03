<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Tools\Setup;

class DoctrineFactory {

	/* Static methods */

	/**
	 * Get Doctrine's entity manager
	 *
	 * @throws ORMException
	 */
	public static function getEntityManager(): EntityManager {
		$isDevMode = true;

		$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
		$conn = array(
			'driver' => 'pdo_sqlite',
			'path' => __DIR__ . '/db.sqlite',
		);

		return EntityManager::create($conn, $config);
	}

}