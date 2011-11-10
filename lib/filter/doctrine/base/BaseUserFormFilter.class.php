<?php

/**
 * User filter form base class.
 *
 * @package    sfmelodydemo
 * @subpackage filter
 * @author     mourad.majdoub
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUserFormFilter extends sfGuardUserFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('user_filters[%s]');
  }

  public function getModelName()
  {
    return 'User';
  }
}
