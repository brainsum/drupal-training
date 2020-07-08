<?php

/**
 * @file
 * Site settings set up for k8s deployment.
 */

// Hash salt.
$settings['hash_salt'] = getenv('DRUPAL_HASH_SALT');

// Disallow access to update.php by anonymous users.
$settings['update_free_access'] = FALSE;
// Disallow updating modules via the Update Manager UI.
$settings['allow_authorize_operations'] = FALSE;
// Don't scan tests.
$settings['extension_discovery_scan_tests'] = FALSE;
// Enable permission hardening.
$settings['skip_permissions_hardening'] = FALSE;

// Other helpful settings.
/** @var string $app_root */
/** @var string $site_path */
$settings['container_yamls'][] = $app_root . '/' . $site_path . '/services.yml';

// Database connection.
$databases = [];
$databases['default']['default'] = [
  'database' => getenv('DRUPAL_DATABASE_NAME'),
  'username' => getenv('DRUPAL_DATABASE_USERNAME'),
  'password' => getenv('DRUPAL_DATABASE_PASSWORD'),
  'prefix' => '',
  'host' => getenv('DRUPAL_DATABASE_HOST'),
  'port' => getenv('DRUPAL_DATABASE_PORT'),
  'namespace' => 'Drupal\Core\Database\Driver\mysql',
  'driver' => 'mysql',
];

$settings['file_scan_ignore_directories'] = [
  'node_modules',
  'bower_components',
];

$settings['entity_update_batch_size'] = 50;
$settings['entity_update_backup'] = TRUE;

$settings['file_public_path'] = 'sites/default/files';
$settings['file_private_path'] = '../private_files';
$settings['config_sync_directory'] = '../config/sync';
$settings['file_temp_path'] = '/tmp';

if (file_exists(__DIR__ . '/../../../settings/settings.local.php')) {
  include_once __DIR__ . '/../../../settings/settings.local.php';
}
