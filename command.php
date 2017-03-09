<?php
   $text = $_POST['text'];
    
    if (0 === strpos($text, "add ") && strlen($text) > 4) {
        include('command-add.php');
    } else if ($text == "complete") {
        include('command-complete.php');
    } else if ($text == "list") {
        include('command-list.php');
    } else if ($text == "history") {
	include('command-history.php');
    } else {
        include('command-help.php');
    }

?>
