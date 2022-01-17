<?php
    class Spedition extends Utility
    {
        private $arrayOfPath;
        private $treno;
        private $timeStampPartenza;
        
        public function Spedition($arrayOfPath, $treno, $timeStampPartenza)
        {
            $this->Utility("spedition");
            $this->arrayDiPath=$arrayOfPath;
            $this->treno=$treno;
            $this->timeStamp=$timeStampPartenza;
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

        public function getTimeStampPartenza()
        {
            return $this->timeStampPartenza;
        }

        public function setTimeStampPartenza($timeStampPartenza)
        {
            $this->timeStampPartenza=$timeStampPartenza;
        }

    }
?>