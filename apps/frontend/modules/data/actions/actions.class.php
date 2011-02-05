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

        $endtime = (strtotime('2011-02-06 22:00') - time()) / 60 / 60;


        if ($endtime < 1) {
            $endtime = 1;
        }

        $remaining = WingPeer::getRemaining() / $endtime;

        $d = array('current' => $current, 'need' => $remaining);

        return $this->renderJson($d);
    }

    protected function renderJson($data) {
        $this->getResponse()->setHttpHeader('Content-type', 'application/json');
        $this->renderText(json_encode($data));
        return sfView::NONE;
    }
}