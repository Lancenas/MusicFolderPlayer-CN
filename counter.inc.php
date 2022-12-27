<?php
   	$max_len = 9;
		$CounterFile = "counter.dat";
		if(!file_exists($CounterFile)){
			 $counter = 0;     
			 $cf = fopen($CounterFile,"w");
			 fputs($cf,'0');
			 fclose($cf); 
        }
		else{ 
		    $cf = fopen($CounterFile,"r");
		    $counter = trim(fgets($cf,$max_len));
		    fclose($cf);
		}
		$counter++;
		$cf = fopen($CounterFile,"w");
		fputs($cf,$counter);
		fclose($cf);
	?>
