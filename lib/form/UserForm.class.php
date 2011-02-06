<?php

/**
 * User form.
 *
 * @package    Keep Winging
 * @subpackage form
 * @author     Graham Christensen
 */
class UserForm extends BaseUserForm {

    public function configure() {
        $this->useFields(array('name', 'rfid_tag', 'team_id', 'picture'));

        $this->setWidget('rfid_tag', new sfWidgetFormInputHidden());

        $this->setWidget('picture', new sfWidgetFormInputFile());

        $this->setValidator('picture', new sfValidatorFile(
                        array(
                            'max_size' => 500000,
                            'mime_types' => 'web_images',
                            'path' => sfConfig::get('sf_web_dir') . '/uploads/',
                            'required' => true
                        )
        ));
    }
}
