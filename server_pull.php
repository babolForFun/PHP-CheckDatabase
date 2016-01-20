<?php

    include_once($_SERVER['DOCUMENT_ROOT']."constant.php");

 	/**
    * Check date changes in database
    *
    * @access public
    * @author BabolForFun - {@link http://babolforfun.github.io}
    * @return AJAX response
    */
    public function pulling(){

		$dbhost 		 = HOST_NAME;
		$dbname 		 = DB_NAME;
		$dbAdminName 	 = SYS_ADMIN;
		$dbAdminPassword = SYS_PASSWORD;

		if (!$link = mysql_connect($dbhost, $dbAdminName, $dbAdminPassword)) {
		    echo 'Could not connect to mysql';
		    exit;
		}

		// Check connection
		if ($conn->connect_error) {
			echo 'Could not connect to database';
		    die("Connection failed: " . $conn->connect_error);
		} 

		if (!mysql_select_db($dbname, $link)) {
		    echo 'Could not select database';
		    exit;
		}

		$sql    =  'SELECT UPDATE_TIME
					FROM   information_schema.tables
					WHERE  TABLE_SCHEMA = ' . TABLE_SCHEMA . '
					AND TABLE_NAME = ' . TABLE_NAME;
		$result = mysql_query($sql, $link);

		if (!$result) {
		    echo "DB Error, could not query the database\n";
		    echo 'MySQL Error: ' . mysql_error();
		    exit;
		}

		while ($row = mysql_fetch_assoc($result)) {
		    echo $row['UPDATE_TIME'];
		}

		mysql_free_result($result);
		echo $result;
	}
	
?>