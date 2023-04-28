<?php

namespace Drupal\learn_module;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface defining a custom entity entity type.
 */
interface CustomEntityInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

}
