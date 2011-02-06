<?php


/**
 * Skeleton subclass for performing query and update operations on the 'feed' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Sun Feb  6 10:43:07 2011
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class FeedPeer extends BaseFeedPeer {
    public static function getLatest($since = false) {
        $c = new Criteria();
        $c->addDescendingOrderByColumn(self::CREATED_AT);
        $c->setLimit(10);

        if ($since) {
            $c->add(self::ID, $since, Criteria::GREATER_EQUAL);
        }

        return self::doSelect($c);
    }
} // FeedPeer
