<?php

namespace Drupal\learn_module\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the custom entity type configuration entity.
 *
 * @ConfigEntityType(
 *   id = "custom_entity_type",
 *   label = @Translation("custom entity type"),
 *   label_collection = @Translation("custom entity types"),
 *   label_singular = @Translation("custom entity type"),
 *   label_plural = @Translation("custom entities types"),
 *   label_count = @PluralTranslation(
 *     singular = "@count custom entities type",
 *     plural = "@count custom entities types",
 *   ),
 *   handlers = {
 *     "form" = {
 *       "add" = "Drupal\learn_module\Form\CustomEntityTypeForm",
 *       "edit" = "Drupal\learn_module\Form\CustomEntityTypeForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm",
 *     },
 *     "list_builder" = "Drupal\learn_module\CustomEntityTypeListBuilder",
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     }
 *   },
 *   admin_permission = "administer custom entity types",
 *   bundle_of = "custom_entity",
 *   config_prefix = "custom_entity_type",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "add-form" = "/admin/structure/custom_entity_types/add",
 *     "edit-form" = "/admin/structure/custom_entity_types/manage/{custom_entity_type}",
 *     "delete-form" = "/admin/structure/custom_entity_types/manage/{custom_entity_type}/delete",
 *     "collection" = "/admin/structure/custom_entity_types"
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "uuid",
 *   }
 * )
 */
class CustomEntityType extends ConfigEntityBundleBase {

  /**
   * The machine name of this custom entity type.
   *
   * @var string
   */
  protected $id;

  /**
   * The human-readable name of the custom entity type.
   *
   * @var string
   */
  protected $label;

}
