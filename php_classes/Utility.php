<?php
    abstract class Utility
    {
        private $id;
        
        public function Utility($string)
        {
            switch($string)
            {
                case "wagon":
                    $this->id='W';
                    break;
                case "train":
                    $this->id='T';
                    break;
                case "spedition":
                    $this->id='S';
                    break;
                case "private":
                    $this->id='P';
                    break;
                case "path":
                    $this->id='p';
                    break;  
                case "machinist":
                    $this->id='M';
                    break;
                case "hub":
                    $this->id='H';
                    break;
                case "enterprise":
                    $this->id='E';
                    break;
                case "box":
                    $this->id='B';
                    break;  
            }
            $this->id .=rand(1000,999999);
        }

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id=$id;
        }
    }
?>