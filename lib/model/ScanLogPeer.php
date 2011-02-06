<?php


/**
 * Skeleton subclass for performing query and update operations on the 'scan_log' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Sat Feb  5 15:36:24 2011
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class ScanLogPeer extends BaseScanLogPeer {

    /**
     * Determine if a tag has been scanned recently
     *
     * @param Tag $tag
     * @return bool
     */
    public static function scannedRecently(Tag $tag) {
        $c = new Criteria();
        $c->add(self::TAG_ID, $tag->getId());
        $c->add(self::CREATED_AT, strtotime('30 seconds ago'));

        return (bool) self::doCount($c);
    }
} // ScanLogPeer