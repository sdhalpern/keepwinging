<?php
class chartComponents extends sfComponents {
    public function executeBurnup(sfWebRequest $request) {
        $this->points = WingPeer::getBurnup();
    }
}