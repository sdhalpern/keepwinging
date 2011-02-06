<?php

/**
 * User form.
 *
 * @package    Keep Winging
 * @subpackage form
 * @author     Graham Christensen
 */
class UserForm extends BaseUserForm
{
  public function configure()
  {
      $this->useFields(array('name', 'rfid_tag', 'rfid_number'));
      
      $this->setWidget('rfid_tag', new sfWidgetFormInputHidden());

  }
}
