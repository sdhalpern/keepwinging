<?php

class feedComponents extends sfComponents {
    public function executeItems(sfWebRequest $request) {
        $this->items = FeedPeer::getLatest();
    }
}