<?php

/**
 * Tag form base class.
 *
 * @method Tag getObject() Returns the current form's model object
 *
 * @package    Keep Winging
 * @subpackage form
 * @author     Graham Christensen
 */
abstract class BaseTagForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'tag'        => new sfWidgetFormInputText(),
      'user_id'    => new sfWidgetFormPropelChoice(array('model' => 'User', 'add_empty' => false)),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'tag'        => new sfValidatorString(array('max_length' => 255)),
      'user_id'    => new sfValidatorPropelChoice(array('model' => 'User', 'column' => 'id')),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tag[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tag';
  }


}
