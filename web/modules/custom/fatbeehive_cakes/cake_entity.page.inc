<?php

/**
 * @file
 * Contains cake_entity.page.inc.
 *
 * Page callback for Cake entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Cake templates.
 *
 * Default template: cake_entity.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_cake_entity(array &$variables) {
  // Fetch CakeEntity Entity Object.
  $cake_entity = $variables['elements']['#cake_entity'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
