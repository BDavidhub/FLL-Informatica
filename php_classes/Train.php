<?php
    class Train extends Utility{
        private $arrayOfWagon;
        private $limit;

        public function __construct($arrayOfWagon, $limit)
        {
            $this->arrayOfWagon=$arrayOfWagon;
            $this->limit=$limit;
            $this->Utility("train");
        }
        
        public function getArrayOfWagon() {
            return $this->arrayOfWagon;
        }

        public function setArrayOfWagon($arrayOfWagon) {
             $this->arrayOfWagon = $arrayOfWagon;
        }

        public function getLimit() {
            return $this->limit;
        }

        public function setLimit($limit) {
             $this->limit = $limit;
        }

        public function calcolaVagoniLiberi()
        {
            return 1;
        }

    }
?>