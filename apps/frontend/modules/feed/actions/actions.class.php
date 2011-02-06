<?php

class feedActions extends sfActions {
    public function executeIndex(sfWebRequest $request) {
        $this->since = $request->getParameter('since', false);
    }
}