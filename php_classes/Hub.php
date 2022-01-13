<?php
    class Hub extends User{
        private $capacity;
        private $name;

        public function Hub($mail, $password, $id, $telephone, $capacity, $name)
        {
            $this->setMail($mail);
            $this->setPassword($password);
            $this->setId($id);
            $this->setTelephone($telephone);
            $this->capacity=$capacity;
            $this->name=$name;
        }
    }
?>