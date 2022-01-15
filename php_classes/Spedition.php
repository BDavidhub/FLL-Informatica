<?php
    class Spedition extends Utility
    {
        private $arrayOfPath;
        private $treno;
        private $timeStamp;
        private $partenza;
        
        public function Spedition($arrayOfPath, $treno, $timeStamp, $partenza)
        {
            $this->Utility("spedition");
            $this->arrayDiPath=$arrayOfPath;
            $this->treno=$treno;
            $this->timeStamp=$timeStamp;
            $this->partenza=$partenza;
        }

        public function getArrayOfPath()
        {
            return $this->arrayOfPath;
        }

        public function setArrayOfPath($arrayOfPath)
        {
            $this->arrayOfPath=$arrayOfPath;
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