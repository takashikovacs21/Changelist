<?php
	//print_r($_POST["changelist"]);
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	echo "<pre>";

	$input_string = $_POST["changelist"];



	$changelistLines = MatchAndRemoveDuplicates("/Change: [0-9]+/", $input_string); //Change: 187698
	$changelistArray = array_map( "RemoveWordChange", $changelistLines);
	PrintArray($changelistArray, " ");

	PrintArray(MatchAndRemoveDuplicates('/SD-[0-9]+/', $input_string), " ");
	PrintArray(MatchAndRemoveDuplicates('/\/\/DotNet\/offcycle\/Source\/CMSViews\/[^#]+/', $input_string), "\n");
	PrintArray(MatchAndRemoveDuplicates('/\/\/DotNet\/offcycle\/Web_Solutions\/[^#]+/', $input_string), "\n");

	function MatchAndRemoveDuplicates($preg, $input){
		preg_match_all($preg, $input, $newarr, PREG_PATTERN_ORDER );
		sort($newarr[0]);
		$sortedArray = $newarr[0];
		$result = array();
		for($x = 0; $x < sizeof($sortedArray); $x++){ //go through the sorted array and basicall remove dupilcates

			if($x > 0 && $sortedArray[$x-1] == $sortedArray[$x]){
				continue;
			}

			if(trim($sortedArray[$x]!="")){
				array_push($result,$sortedArray[$x]);
			}
		}
		return $result;		
	}

	function PrintArray($array, $spacer){
		foreach ($array as $value){
			echo $value.$spacer;
		}
		echo "\n";
	}

	function RemoveWordChange($array){
		//Changelist numbers come in the form of Change: 187695
		return substr($array, 8);
	}

	//print_r($sdarray);
	//echo $stringarray[1];
	echo "</pre>";
?> 