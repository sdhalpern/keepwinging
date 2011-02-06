<?php

class dataComponents extends sfComponents {
    public function executeBoxes(sfWebRequest $request) {
        $this->total = WingPeer::getEaten();
        $this->remain = WingPeer::getRemaining();

        $this->rate = WingPeer::getRate();
        $this->need = WingPeer::getNecessaryRate();
    }
}