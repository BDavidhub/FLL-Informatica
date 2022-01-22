<?php
    class Path extends Utility
    {
        private $arrayOfHub;
        
        public function __construct($arrayOfHub,$cod)
        {
            parent::__construct("path",$cod);
            $this->arrayOfHub=$arrayOfHub;
        }

        public function getArrayOfHub()
        {
            return $this->arrayOfHub;
        }

        public function setArrayOfHub($arrayOfHub)
        {
            $this->arrayOfHub=$arrayOfHub;
        }
    }
?>