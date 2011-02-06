<?php

/**
 * default actions.
 *
 * @package    Keep Winging
 * @subpackage default
 * @author     Graham Christensen
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class defaultActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
	$this->setLayout('homepage');
  }

  public function executeDashboard(sfWebRequest $request) {
      
  }

  public function executeFeed(sfWebRequest $request) {
      $this->feed = FeedPeer::getLatest();

      $this->setLayout('feed'); 
  }
}
