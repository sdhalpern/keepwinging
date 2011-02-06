<?php

/**
 * ScanLog filter form base class.
 *
 * @package    Keep Winging
 * @subpackage filter
 * @author     Graham Christensen
 */
abstract class BaseScanLogFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'tag_id'     => new sfWidgetFormPropelChoice(array('model' => 'Tag', 'add_empty' => true)),
      'skipped'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'tag_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tag', 'column' => 'id')),
      'skipped'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('scan_log_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ScanLog';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'tag_id'     => 'ForeignKey',
      'skipped'    => 'Boolean',
      'created_at' => 'Date',
    );
  }
}
