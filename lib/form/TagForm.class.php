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
      $this->useFields(array('tag', 'number'));

      $this->getWidget('tag')->setLabel('RFID Tag');
      $this->getWidget('number')->setLabel('RFID Number');
      $this->getWidgetSchema()->setHelp('tag', 'Copy/paste from RFID reader.');
      $this->getWidgetSchema()->setHelp('number', 'Found on the back of the RFID tag.');
  }
}
