<?php

/**
 * Token form base class.
 *
 * @method Token getObject() Returns the current form's model object
 *
 * @package    sfmelodydemo
 * @subpackage form
 * @author     mourad.majdoub
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTokenForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'name'           => new sfWidgetFormInputText(),
      'token_key'      => new sfWidgetFormTextarea(),
      'token_secret'   => new sfWidgetFormTextarea(),
      'user_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'expire'         => new sfWidgetFormInputText(),
      'params'         => new sfWidgetFormTextarea(),
      'identifier'     => new sfWidgetFormInputText(),
      'status'         => new sfWidgetFormInputText(),
      'o_auth_version' => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'           => new sfValidatorString(array('max_length' => 127, 'required' => false)),
      'token_key'      => new sfValidatorString(array('required' => false)),
      'token_secret'   => new sfValidatorString(array('required' => false)),
      'user_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
      'expire'         => new sfValidatorInteger(array('required' => false)),
      'params'         => new sfValidatorString(array('required' => false)),
      'identifier'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'status'         => new sfValidatorString(array('max_length' => 127, 'required' => false)),
      'o_auth_version' => new sfValidatorInteger(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('token[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Token';
  }

}
