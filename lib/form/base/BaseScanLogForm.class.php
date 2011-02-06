<?php

/**
 * ScanLog form base class.
 *
 * @method ScanLog getObject() Returns the current form's model object
 *
 * @package    Keep Winging
 * @subpackage form
 * @author     Graham Christensen
 */
abstract class BaseScanLogForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'tag_id'     => new sfWidgetFormPropelChoice(array('model' => 'Tag', 'add_empty' => false)),
      'skipped'    => new sfWidgetFormInputCheckbox(),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'tag_id'     => new sfValidatorPropelChoice(array('model' => 'Tag', 'column' => 'id')),
      'skipped'    => new sfValidatorBoolean(),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('scan_log[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ScanLog';
  }


}
