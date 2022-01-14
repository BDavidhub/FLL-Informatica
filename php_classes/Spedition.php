<?php
    class Spedition extends Utility
    {
        private $arrayDiPath;
        private $treno;
        private $timeStamp;
        private $partenza;
        
        public function Spedition($arrayDiPath, $treno, $timeStamp, $partenza)
        {
            $this->Utility("spedition");
            $this->arrayDiPath=$arrayDiPath;
            $this->treno=$treno;
            $this->timeStamp=$timeStamp;
            $this->partenza=$partenza;
        }

        public function getArrayDiPath()
        {
            return $this->arrayDiPath;
        }

        public function setArrayDiPath($arrayDiPath)
        {
            $this->arrayDiPath=$arrayDiPath;
        }

        public function getTreno()
        {
            return $this->treno;
        }

        public function setTreno($treno)
        {
            $this->treno=$treno;
        }

        public function getTimeStamp()
        {
            return $this->timeStamp;
        }

        public function setTimeStamp($timeStamp)
        {
            $this->timeStamp=$timeStamp;
        }

        public function getPartenza()
        {
            return $this->partenza;
        }

        public function setPartenza($partenza)
        {
            $this->partenza=$partenza;
        }

    }
?>