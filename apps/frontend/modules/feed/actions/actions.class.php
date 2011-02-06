<?php

class feedActions extends sfActions {
    public function executeIndex(sfWebRequest $request) {
        $this->setLayout('feed');
    }
}