<?php
	//print_r($_POST["changelist"]);
	error_reporting(E_ALL);
	 ini_set("display_errors", 1);
	echo "<pre>";
	$newstring = "";

	$input_string = $_POST["changelist"];

	$stringarray = preg_split("/Change: /",$input_string);

	//var_dump($stringarray);
	$changelistIDs = array();
	for($x = 0; $x < sizeof($stringarray); $x++)
	{
		if(trim($stringarray[$x]!="")){
			$temp = substr($stringarray[$x], 0, 6);
			array_push($changelistIDs, $temp);
		}
	}

	sort($changelistIDs);
	for($x = 0; $x < sizeof($changelistIDs); $x++)
	{
		if($x > 0 && $changelistIDs[$x-1] == $changelistIDs[$x]){
			continue;
		}
		if(trim($changelistIDs[$x]!="")){
			echo $changelistIDs[$x];
			if($x != sizeof($changelistIDs)-1)
				echo ", ";
		}

	}

	preg_match_all('/SD-[0-9]+/', $input_string , $arr, PREG_PATTERN_ORDER);
	//$sdarray = preg_grep("/SD-[0-9]+/", $input_string)
	sort($arr[0]);
	echo "\n\n";
	for($x = 0; $x < sizeof($arr[0]); $x++)
	{
		if($x > 0 && $arr[0][$x-1] == $arr[0][$x]){
			continue;
		}
		if(trim($arr[0][$x]!="")){
			echo $arr[0][$x];
			if($x != sizeof($arr[0])-1)
				echo ", ";
		}

	}

	preg_match_all('/\/\/DotNet\/offcycle\/Source\/CMSViews\/[^#]+/', $input_string , $newarr, PREG_PATTERN_ORDER);
	sort($newarr[0]);
	echo "\n\n";
	for($x = 0; $x < sizeof($newarr[0]); $x++)
	{
		if($x > 0 && $newarr[0][$x-1] == $newarr[0][$x]){
			continue;
		}
		if(trim($newarr[0][$x]!="")){
			echo $newarr[0][$x];
			if($x != sizeof($newarr[0])-1)
				echo "\n";
		}

	}

	preg_match_all('/\/\/DotNet\/offcycle\/Web_Solutions\/[^#]+/', $input_string , $newarr, PREG_PATTERN_ORDER);
	sort($newarr[0]);
	echo "\n\n";
	for($x = 0; $x < sizeof($newarr[0]); $x++)
	{
		if($x > 0 && $newarr[0][$x-1] == $newarr[0][$x]){
			continue;
		}
		if(trim($newarr[0][$x]!="")){
			echo $newarr[0][$x];
			if($x != sizeof($newarr[0])-1)
				echo "\n";
		}

	}

	function MatchAndRemoveDuplicates($preg, $input){
		preg_match_all($preg, $input, $newarr, PREG_PATTERN_ORDER );
		
	}

	//print_r($sdarray);
	//echo $stringarray[1];
	echo "</pre>";
?> 