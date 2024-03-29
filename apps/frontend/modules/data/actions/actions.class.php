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

    public function executeReport(sfWebRequest $request) {

        $tag = $request->getGetParameter('tag');

        $user = UserPeer::retrieveByTag($tag);

        if (!$user instanceof User) {
            return $this->renderJson(array('success' => false));
        }

        $new_number = $user->incrementWingConsumption();


        $e = new Feed();
        $e->setUser($user);
        if ($new_number == 100) {
            $e->setText(' just finished 5 more wings, PUTTING \'EM AT 100 WINGS!');
        } elseif ($new_number == 5) {
            $e->setText(' just finished their first five wings!');
        } else {
            $e->setText(' just finished 5 more wings, and is now up to ' . $new_number . ' wings!');
        }
        $e->save();
        

        return $this->renderJson(array('success' => true, 'number' => $new_number));
    }

    protected function renderJson($data) {
        $this->getResponse()->setHttpHeader('Content-type', 'application/json');
        $this->renderText(json_encode($data));
        return sfView::NONE;
    }

}