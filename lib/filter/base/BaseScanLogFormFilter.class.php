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
      'tag'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'skipped'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'tag'        => new sfValidatorPass(array('required' => false)),
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
      'tag'        => 'Text',
      'skipped'    => 'Boolean',
      'created_at' => 'Date',
    );
  }
}
