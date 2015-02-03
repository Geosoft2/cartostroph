<?php

// Error reporting:
error_reporting(E_ALL^E_NOTICE);

include "connect.php";
include "comment.class.php";

/*
/	This array is going to be populated with either
/	the data that was sent to the script, or the
/	error messages.
/*/

$arr = array();
$validates = Comment::validate($arr);

if($validates)
{
	/* Everything is OK, insert to database: */
		pg_query("	INSERT INTO comments(name,page_id,rating,body,leftpoint,rightpoint)
					VALUES (
						'".$arr['name']."',
						'".$arr['page_id']."',
						'".$arr['rating']."',
						'".$arr['body']."',
						'".$arr['leftpoint']."  ',
						'".$arr['rightpoint']."'
					)");
	
	$arr['dt'] = date('r',time());
	$arr['id'] = 1;
	
	/*
	/	The data in $arr is escaped for the mysql query,
	/	but we need the unescaped variables, so we apply,
	/	stripslashes to all the elements in the array:
	/*/
	
	$arr = array_map('stripslashes',$arr);
	
	$insertedComment = new Comment($arr);

	/* Outputting the markup of the just-inserted comment: */

	echo json_encode(array('status'=>1,'html'=>$insertedComment->markup()));

}
else
{
	/* Outputtng the error messages */
	echo '{"status":0,"errors":'.json_encode($arr).'}';
}

?>