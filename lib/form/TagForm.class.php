<?php

/**
 * Tag form.
 *
 * @package    Keep Winging
 * @subpackage form
 * @author     Graham Christensen
 */
class TagForm extends BaseTagForm
{
  public function configure()
  {
      $this->useFields(array('number'));

      $this->getWidget('number')->setLabel('RFID Number');
      $this->getWidgetSchema()->setHelp('number', 'Found on the back of the RFID tag.');
  }
}
