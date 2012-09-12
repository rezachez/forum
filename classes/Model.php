<?php
    class Model {
        function __construct($args = null){
            if (isset($args)){
                foreach ($args as $name => $value){
                    $this->$name = $value;
                }
            }
        }
    }
?>