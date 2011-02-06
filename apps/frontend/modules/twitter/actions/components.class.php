<?php
class twitterComponents extends sfComponents {
    public function executeStream(sfWebRequest $request) {
        $this->tweets = array('Hey there...');
    }
}