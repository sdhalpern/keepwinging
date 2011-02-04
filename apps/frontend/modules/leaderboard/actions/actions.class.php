<?php

/**
 * leaderboard actions.
 *
 * @package    Keep Winging
 * @subpackage leaderboard
 * @author     Graham Christensen
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class leaderboardActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
	$this->users = UserPeer::retrieveTopEaters();
  }
}
