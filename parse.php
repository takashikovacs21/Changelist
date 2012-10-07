<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	
	<body>
<div id="banner"><a href="https://github.com/aspirationalvigilante/Changelist">Fork me on GitHub</a></div>
<?php
	//print_r($_POST["changelist"]);
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$input_string = $_POST["changelist"];

	$changelistLines = MatchAndRemoveDuplicates("/Change: [0-9]+/", $input_string); //Change: 187698
	$changelistArray = array_map( "RemoveWordChange", $changelistLines);
	PrintArray($changelistArray, " ", "Changelist Numbers");

	PrintArray(MatchAndRemoveDuplicates('/SD-[0-9]+/', $input_string), " ", "SD Numbers");
	PrintArray(MatchAndRemoveDuplicates('/\/\/DotNet\/offcycle\/Source\/CMSViews\/[^#]+/', $input_string), "\n", "CMS Files");
	PrintArray(MatchAndRemoveDuplicates('/\/\/DotNet\/offcycle\/Web_Solutions\/[^#]+/', $input_string), "\n", "Application Files");

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

	function PrintArray($array, $spacer, $id){
		echo "<h1>$id</h1>";
		$id_name = str_replace(" ", "_", $id);
		echo "<div id='".$id_name."_button' class='copy_button'>Copy To Clipboard</div>";
		if($spacer == " ")
			echo "<textarea cols='100' rows='5' id='$id_name'>";
		else
			echo "<textarea cols='100' rows='20' id='$id_name'>";
		foreach ($array as $value){
			echo $value.$spacer;
		}
		echo "</textarea>";
	}

	function RemoveWordChange($array){
		//Changelist numbers come in the form of Change: 187695
		return substr($array, 8);
	}

?> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="ZeroClipboard.min.js"></script>
<script>
	ZeroClipboard.setMoviePath( 'ZeroClipboard10.swf' );
	var titles = ["Changelist Numbers", "SD Numbers", "CMS Files", "Application Files"];
	
	var clip1 = new ZeroClipboard.Client();
    clip1.setHandCursor( true );
	clip1.addEventListener( 'onMouseDown', function(client) {
	    clip1.setText( document.getElementById("Changelist_Numbers").value );
	    $(".copy_button").text("Copy To Clipboard");
	    $("#Changelist_Numbers_button").text("Copied");
	} );
	clip1.glue("Changelist_Numbers_button");
	
	var clip2 = new ZeroClipboard.Client();
	clip2.setHandCursor( true );
	clip2.addEventListener( 'onMouseDown', function(client) {
	    clip2.setText( document.getElementById("SD_Numbers").value );
	    $(".copy_button").text("Copy To Clipboard");
	    $("#SD_Numbers_button").text("Copied");
	} );
	clip2.glue("SD_Numbers_button");
	
	var clip3 = new ZeroClipboard.Client();
	clip3.setHandCursor( true );
	clip3.addEventListener( 'onMouseDown', function(client) {
	    clip3.setText( document.getElementById("CMS_Files").value );
	    $(".copy_button").text("Copy To Clipboard");
	    $("#CMS_Files_button").text("Copied");
	} );
	clip3.glue("CMS_Files_button");
	
	var clip4 = new ZeroClipboard.Client();
	clip4.setHandCursor( true );
	clip4.addEventListener( 'onMouseDown', function(client) {
		clip4.setText( document.getElementById("Application_Files").value );
		$(".copy_button").text("Copy To Clipboard");
		$("#Application_Files_button").text("Copied");
	} );
	clip4.glue("Application_Files_button");

</script>
</body>
</html>