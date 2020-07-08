<?php

/**
 * @file
 * Local settings and overrides.
 */

if (file_exists(__DIR__ . '/settings.development.php')) {
  include_once __DIR__ . '/settings.development.php';
}

if (file_exists(__DIR__ . '/services.local.yml')) {
  $settings['container_yamls'][] = __DIR__ . '/services.local.yml';
}
