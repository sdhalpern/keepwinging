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
      $this->useFields(array('name'));
  }
}
