<?php

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
