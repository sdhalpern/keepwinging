<?php


/**
 * Skeleton subclass for performing query and update operations on the 'user' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Fri Feb  4 18:31:12 2011
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class UserPeer extends BaseUserPeer {
	public static function retrieveTopEaters() {
		$c = new Criteria();
		$c->addJoin(WingPeer::USER_ID, UserPeer::ID);
		$c->addDescendingOrderByColumn('total');
        self::addSelectColumns($c);
        $c->addAsColumn('total', 'SUM(' . WingPeer::NUMBER . ')');
        $c->addGroupByColumn(UserPeer::ID);
		$c->setLimit(7);
		
		return self::doSelect($c);
	}

    public static function retrieveByTag($tag) {
        $c = new Criteria();
        $c->add(self::RFID_TAG, $tag);

        return self::doSelectOne($c);
    }
} // UserPeer
