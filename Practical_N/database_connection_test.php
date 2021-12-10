<?php

// use database credential file
require "database_credentials.php";

	$connection = new mysqli(SERVER,USERNAME,PASSWORD,DATABASE);
	if($connection ->connect_error){
		echo "Connection failed";
	}
	


?>