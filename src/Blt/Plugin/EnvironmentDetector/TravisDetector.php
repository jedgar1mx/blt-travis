<?php

namespace Acquia\BltTravis\Blt\Plugin\EnvironmentDetector;

use Acquia\Blt\Robo\Common\EnvironmentDetector;

class TravisDetector extends EnvironmentDetector {
  public static function getCiEnv() {
    return getenv('TRAVIS') ? 'travis' : null;
  }

  public static function getCiSettingsFile(): string {
    if (self::getCiEnv() === 'travis') {
      return sprintf('%s/vendor/acquia/blt-travis/settings/travis.settings.php', dirname(DRUPAL_ROOT));
    }else{
      return sprintf('%s/vendor/acquia/blt/settings/pipelines.settings.php', dirname(DRUPAL_ROOT));
    }
  }
}
