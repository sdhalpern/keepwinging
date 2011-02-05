<?php


/**
 * Skeleton subclass for performing query and update operations on the 'wing' table.
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
class WingPeer extends BaseWingPeer {

    public static function getTotal() {
        return 1000;
    }

    public static function getEaten() {
        $sql = 'SELECT SUM(wing.number) AS number FROM wing;';

        $con = Propel::getConnection();
        $stmt = $con->prepare($sql);
        $r = $stmt->execute();
        if (!$r) {
            return 0;
        }

        return $stmt->fetchColumn(0);
    }

    public static function getRemaining() {
        return self::getTotal() - self::getEaten();
    }

    public static function getEvery5Minutes() {
        $sql = 'SELECT
                    wing.user_id,
                    SUM(wing.number) AS number,
                    wing.created_at
                FROM wing
                GROUP BY ((12)
                          * HOUR( wing.created_at )
                          + FLOOR( MINUTE( wing.created_at ) / 5 ))';

        $con = Propel::getConnection();
        $stmt = $con->prepare($sql);
        $r = $stmt->execute();
        if (!$r) {
            return array();
        }

        $recs = $stmt->fetchAll(PropelPDO::FETCH_ASSOC);
        
        $ret = array();
        foreach ($recs as $rec) {
            $time = new DateTime($rec['created_at']);
            $str = $time->format('Y-m-d h:');
            $min = $time->format('i');
            $str .= $min - ($min % 5);



            $ret[strtotime($str)] = (int)$rec['number'];
        }

        return $ret;
    }

    public static function getRate() {
        $sql = 'SELECT SUM(wing.number) AS total
                FROM wing
                WHERE wing.created_at >= :time';
        $con = Propel::getConnection();
        $stmt = $con->prepare($sql);
        $stmt->bindValue(':time', strtotime('60 minutes ago'));
        $r = $stmt->execute();
        if (!$r) {
            return 0;
        }

        return (int)$stmt->fetchColumn(0);
    }

    public static function getBurnup() {
        $sum = 0;

        $data = array();
        foreach (self::getEvery5Minutes() as $time => $number) {
            $sum += $number;
            $data[$time] = $sum;
        }

        return $data;
    }
} // WingPeer
