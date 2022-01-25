<?php
	function gestioneVagoni($startend)
	{
		$start=$startend[0];
		$end=$startend[1];
		$uscenti= array();
		$startInvariato=$start;

		//stampa iniziale
		echo "Arrivo: "."<pre>";
		print_r($start);
		echo"</pre>"."<br>"."Parte: "."<pre>";
		print_r($end);
		echo"</pre>";
		
		if(!empty($start) && !empty($end)) //se entrambi gli array hanno almento 1 elemento
		{
			//elimina elementi in start che non sono presenti in end
			foreach($start as $codS)
			{
				if(!in_array($codS, $end))
				{
					array_push($uscenti, $codS);
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
		}

		//stampa finale
		echo "<br>"."Finale: "."<pre>";
		print_r($start);
		echo"</pre>"."<br>"."Uscenti: "."<pre>";
		print_r($uscenti);
		echo"</pre>";
		
		/*
		 * 8 bit da aggiungere
		 * 
		 * 4 bit rappresentanti lo spazio 0000
		 *  - rappresenta il numero di vagoni di immissione: max 15 vagoni

		 * 4 bit di flag
			0000 : non da gestire
			1XXX : vagone deve uscire
			X1XX : vagone prima deve uscire
			XX1X : vagone deve entrare
			XXX1 : quello prima deve entrare (nVagoni)
		 */
		
		$arrayAss=creaArrayAss($uscenti,$end,$startInvariato);
		
		echo "<br>"."Array associativo: "."<pre>";
		print_r($arrayAss);
		echo"</pre>";
		return $arrayAss;
	}
	
	function creaArrayAss($uscenti,$end,$startInvariato)
	{
		$arrayAss=[];
		foreach($uscenti as $codU) //gestione $uscenti
		{
			if(strcmp($codU,$uscenti[0])==0)
				$arrayAss[$codU]= "00001000";
			else
				$arrayAss[$codU]= "00000000";
		}
		$cont=0;
		foreach($end as $codE) //gestione $end
		{
			if(!empty($uscenti) && strcmp($codE,$end[0])==0) //se $uscenti ha elementi e sto esaminando il primo elemento di $end (che quindi deve uscire)
				$arrayAss[$codE]= "01"; //quinto e sesto bit (sono gli unici sicuri)
			else
			{
				$arrayAss[$codE]= "00"; //o non ci sono uscenti o non sto esaminando il primo elemento di $end e quindi quello prima sicuramente non deve uscire
			}
			if(!in_array($codE, $startInvariato)) //se l'elemento in $end non c'era in $start (che quindi deve entrare)
			{
				$arrayAss[$codE] = "0000".$arrayAss[$codE];
				if($cont==0) //se sto esaminando il primo elemento che deve entrare
					$arrayAss[$codE] .= "10";
				else //se sto esaminando un elemento che deve entrare (che e' dopo un altro che deve entrare)
					$arrayAss[$codE] .= "00";
				$cont++;
			}
			else
			{
				if($cont!=0) //se l'elemento sta dopo a un elemento che deve entrare (e lui non deve entrare)
				{
					$arrayAss[$codE] = sprintf('%04d', decbin($cont)).$arrayAss[$codE]."01";
					$cont=0;
				}
				else
					$arrayAss[$codE] = "0000".$arrayAss[$codE]."00";
			}
		}
		return $arrayAss;
	}
	
	//dichiarazione
	/*$start= array("CER9LK","KD93J7","CAT7ZB","CBL9YU","SM89T5","JJ6Y9O","LC70UM","G94VK8","P6H9KF");
	$end= array("CAT7ZB","CBL9YU","SM89T5","JJ6Y9O","LC70UM","DVVM97","ET94LJ","G94VK8","P6H9KF","4DMI0L");*/
	$start= array("A","B","D","E","H");
	$end= array("C","D","E","F","G","H","I");
	$startend=array($start,$end);
	gestioneVagoni($startend);
	
?>