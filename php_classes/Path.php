<?php
    class Path extends Utility
    {
        private $arrayOfHub;
        
        public function Path($arrayOfHub)
        {
            $this->Utility("path");
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