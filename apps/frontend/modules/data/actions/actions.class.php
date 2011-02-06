<?php

class dataActions extends sfActions {
    public function executeCount(sfWebRequest $request) {
        $eaten = WingPeer::getEaten();
        $remain = WingPeer::getRemaining();

        $d = array('eaten' => $eaten, 'remaining' => $remain);

        return $this->renderJson($d);
    }

    public function executeRate(sfWebRequest $request) {
        $current = WingPeer::getRate();

        $remaining = WingPeer::getNecessaryRate();

        $d = array('current' => $current, 'need' => $remaining);

        return $this->renderJson($d);
    }

    public function executeRegistered(sfWebRequest $request) {
        $user = UserPeer::retrieveByTag($request->getParameter('tag'));

        return $this->renderJson(array('registered' => $user instanceof User));
    }

    protected function renderJson($data) {
        $this->getResponse()->setHttpHeader('Content-type', 'application/json');
        $this->renderText(json_encode($data));
        return sfView::NONE;
    }
}