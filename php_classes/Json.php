<?php
session_start(); 
    echo json_encode($_SESSION["train"]->twoHub($_SESSION["hub"]));
?>