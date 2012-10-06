<?php
	//print_r($_POST["changelist"]);

	$newstring = "";

	$input_string = $_POST["changelist"];

	$stringarray = preg_split("/Change:/",$input_string);

	var_dump($stringarray);

	for($x = 0; $x < sizeof($stringarray); $x++)
	{
		//echo $key + "/n";
		echo $stringarray[$x];
	}
?> 