<?php
/**
+ * Created by PhpStorm.
+ * User: ruben
+ * Date: 4/12/17
+ * Time: 16:41
+ */

// bootstrap.php
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode);
// or if you prefer yaml or XML
//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
//$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

// database configuration parameters
$conn = array(
        'driver' => 'pdo_sqlite',
        'path' => __DIR__ . '/db.sqlite',
    );

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);