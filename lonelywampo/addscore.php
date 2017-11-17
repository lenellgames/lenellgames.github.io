<?php
        // Configuration
        $mysql_host = 'localhost';
        $mysql_user = 'ww4416_6';
        $mysql_password = 'ftv%&/Tgfzvzuj6';
        $my_database = 'ww4416_db6';
 
        $secretKey = "69LwdeCdRDcreaD8eyH6"; // Change this value to match the value stored in the client javascript below 
 
        $db = mysql_connect($mysql_host, $mysql_user, $mysql_password) or die('Could not connect: ' . mysql_error()); 
        mysql_select_db($my_database) or die('Could not select database');
 
        // Strings must be escaped to prevent SQL injection attack. 
        $name = mysql_real_escape_string($_GET['name'], $db); 
        $score = mysql_real_escape_string($_GET['score'], $db); 
        $hash = $_GET['hash']; 
 
       
        $real_hash = md5($name . $score . $secretKey); 
        if($real_hash == $hash) { 
		$timestamp = date('Y-m-d G:i:s');
            // Send variables for the MySQL database class. 
            $query = "insert into scores values (NULL, '$name', '$score', '$timestamp');"; 
            $result = mysql_query($query) or die('Query failed: ' . mysql_error()); 
  
        } 
?>