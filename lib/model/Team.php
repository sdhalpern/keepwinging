<?php


/**
 * Skeleton subclass for representing a row from the 'team' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Sun Feb  6 13:14:24 2011
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class Team extends BaseTeam {
    public function __toString() {
        return $this->getName();
    }
} // Team
