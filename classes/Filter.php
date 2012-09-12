<?php
    class Filter {
        static function getValidSql($value, $type){
            switch($type){
                case Filter::NUMBER:
                    return intval($value);
                case Filter::STRING:
                    return $value;
            }
            return false;
        }
        static function getValidXss($value){
            return htmlspecialchars($value);
        }
    }
?>