<?php
	
	


	/*
	$start= array("10000000","10000001","10000011","10000100","10000101","10000111","10001000");
	$end= array("10000000","10000010","10000011","10000100","10000101","10000110","10000111","10001000","10001001");
	
		1- vagone gia in posizione
		2- vagone da togliere
		3- vagone da inserire


		var_dump($info);
	*/ 
	//
	
	/*if($end[4]==$start[2]){
		$start[2]=$end[4];
		//inserire vagone
		
	}*/




	$table[] =array();
	$myfile=fopen("table_1.txt","w") or die("Unable to open file!");
	$txt= array("0" =>"1001001","1" => "1001001", "2" => "1001001", "3" => "1001001");
	file_put_contents("table_1.txt", json_encode($txt));
	
	fclose($myfile);
	
	$myfile=fopen("table_1.txt","r") or die("Unable to open file!");
	$read;//[]= array();
	
	$read=json_decode(file_get_contents("table_1.txt"),true);
	
	//var_dump($read);
	
	fclose($myfile);
	
	//echo "<br>"."<br>";
	
	$max=count($read);
	
	for($i=0;$i<$max;$i++){
		$table["code".$i]=$read[$i];
		
	}
	
	//var_dump($table);
	
	//echo "<br>"."<br>";
	
	for($i=0;$i<$max;$i++){
		echo "code".$i." | ".$table["code".$i]."<br>";
		
		
	}
	//$.ajax
	//arriva un array a, e un array b
?>