<?php
    class Model {
        public
            $errors;
        function __construct($args = null){
            if (isset($args)){
                foreach ($args as $name => $value){
                    $this->$name = $value;
                }
            }
        }
        function validInt($args = null){
            foreach ($args as $i => $v){
                $this->$i = intval($v);
            }
        }
        function validStr($args = null){
            foreach ($args as $i => $v){
                $this->$i = $v;
            }
        }
    }
?>