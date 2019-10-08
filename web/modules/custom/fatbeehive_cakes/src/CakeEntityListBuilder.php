<?php

namespace Drupal\fatbeehive_cakes;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Cake entities.
 *
 * @ingroup fatbeehive_cakes
 */
class CakeEntityListBuilder extends EntityListBuilder {


  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Cake ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\fatbeehive_cakes\Entity\CakeEntity */
    $row['id'] = $entity->id();
    $row['name'] = Link::createFromRoute(
      $entity->label(),
      'entity.cake_entity.edit_form',
      ['cake_entity' => $entity->id()]
    );
    return $row + parent::buildRow($entity);
  }

}
