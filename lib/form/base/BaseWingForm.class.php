<?php

/**
 * Wing form base class.
 *
 * @method Wing getObject() Returns the current form's model object
 *
 * @package    Keep Winging
 * @subpackage form
 * @author     Graham Christensen
 */
abstract class BaseWingForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'user_id'    => new sfWidgetFormPropelChoice(array('model' => 'User', 'add_empty' => false)),
      'number'     => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'user_id'    => new sfValidatorPropelChoice(array('model' => 'User', 'column' => 'id')),
      'number'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'created_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('wing[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Wing';
  }


}
