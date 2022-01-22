<?php
session_start(); 
    echo json_encode($_SESSION["train"]->twoHubInverted($_SESSION["hub"]));
