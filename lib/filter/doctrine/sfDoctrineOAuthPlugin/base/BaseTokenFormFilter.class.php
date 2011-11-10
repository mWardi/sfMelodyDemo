<?php

/**
 * Token filter form base class.
 *
 * @package    sfmelodydemo
 * @subpackage filter
 * @author     mourad.majdoub
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTokenFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'           => new sfWidgetFormFilterInput(),
      'token_key'      => new sfWidgetFormFilterInput(),
      'token_secret'   => new sfWidgetFormFilterInput(),
      'user_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'expire'         => new sfWidgetFormFilterInput(),
      'params'         => new sfWidgetFormFilterInput(),
      'identifier'     => new sfWidgetFormFilterInput(),
      'status'         => new sfWidgetFormFilterInput(),
      'o_auth_version' => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'           => new sfValidatorPass(array('required' => false)),
      'token_key'      => new sfValidatorPass(array('required' => false)),
      'token_secret'   => new sfValidatorPass(array('required' => false)),
      'user_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'expire'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'params'         => new sfValidatorPass(array('required' => false)),
      'identifier'     => new sfValidatorPass(array('required' => false)),
      'status'         => new sfValidatorPass(array('required' => false)),
      'o_auth_version' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('token_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Token';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'name'           => 'Text',
      'token_key'      => 'Text',
      'token_secret'   => 'Text',
      'user_id'        => 'ForeignKey',
      'expire'         => 'Number',
      'params'         => 'Text',
      'identifier'     => 'Text',
      'status'         => 'Text',
      'o_auth_version' => 'Number',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
