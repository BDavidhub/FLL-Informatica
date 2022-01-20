<?php

	//dichiarazione
	$start= array("10000000","10000001","10000011","10000100","10000101","10000111","10001000");
	$end= array("10000000","10000010","10000011","10000100","10000110","10000111","10001000","10001001","10001010");
	
	//stampa iniziale
	print_r($start);
	echo "<br>";
	print_r($end);
	
	//elimina elementi in start che non sono presenti in end
	foreach($start as $codS)
	{
		if(!in_array($codS, $end))
		{
			$elToDel = array_search($codS, $start);
			array_splice($start, $elToDel, 1); //qui si elimina vagone
		}
	}
	
	//inserisce in start gli elementi di end che gli mancano
	foreach($end as $codE)
	{
		if(!in_array($codE, $start))
		{
			$elToIns = array_search($codE, $end);
			array_splice($start, $elToIns , 0, $codE); //qui si inserisce vagone
		}
	}

	//stampa finale
	echo "<br><br>";
	print_r($start);
	echo "<br>";
	print_r($end);
	
?>