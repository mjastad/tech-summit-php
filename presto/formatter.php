<?php

/**
 * Formats a JSON body
 *
 * @category   Core
 * @package    Formatter.php
 * @author     M.Jastad <michael.jastad@nutanix.com>
 * @copyright  2017 Nutanix, Inc.
 * @license    N/A
 * @version    Release: @1.0.1
 * @since      Class available since Release 1.0.0
 */


class Formatter extends RecursiveIteratorIterator {

    public function current()
    {
        $current = parent::current();
        switch($this->key()) {
            case 'email':
                $current = strtolower($current);
                break;
            case 'title':
                $current = ucwords($current);
                break;
            default:
                break;
        }
        return $current;
    }
}

?>
