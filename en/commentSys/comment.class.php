<?php
class Comment
{
	private $data = array();
	
	public function __construct($row)
	{
		/*
		/	The constructor
		*/
		
		$this->data = $row;
	}
	
	public function markup()
	{
		/*
		/	This method outputs the XHTML markup of the comment
		*/
		
		// Setting up an alias, so we don't have to write $this->data every time:
		$d = &$this->data;
		
		$link_open = '';
		$link_close = '';
		

		
		// Converting the time to a UNIX timestamp:
		$d['dt'] = strtotime($d['dt']);

		if($d['name'] === "Gast" || $d['name'] === "Guest" || $d['name'] === "Gosc" ) {	
		$avatar = '<img src="/../Simon/Master/img/CommentSys/Gast.gif" />';
			$farbe  = '';
			$dtfarbe  = '';

		}  else   { 
			$avatar  = '<img src="/../Simon/Master/img/CommentSys/default_avatar.gif" />';
			$farbe  = 'style="background-color:lightgray; border:lightgrey"';
			
		}
			
		if($d['name'] === "$_COOKIE[Autor]") {	
			$edit = '<button type="submit" id="edit" data-reveal-id="t'.$d['id'].'" class="button tiny" >Edit</button>';
		}  else   { 
			$edit  = '';
		}
		
		
		if($d['rating'] == ''){
			$rate = 'not rated';
		}else{
			$checked = $_POST['checkbox1'];
			if($checked== 'on'){
				$rate = 'not rated';
			}else{
				$rate = $d['rating'].' / 5';
			}
			//$rate = $d['rating'].' / 5';
		}
		

		return '			
			<div class="comment" '.$farbe.'>
				<div class="avatar">'.$avatar.'</div>			
				<div class="name"  >'.$d['name'].'</div>
				<div class="rating">'.$rate.'</div>
				<div class="date" title="Added at '.date('H:i \o\n d M Y',$d['dt']).'">'.date('H:i \o\n d M Y',$d['dt']).'</div>
				<input type="hidden" value='.$d['leftpoint'].' />
				<input type="hidden" value='.$d['rightpoint'].' />
				<p>'.$d['body'].'</p>
				'.$edit.'				
				<a onclick="drawBox(this.parentNode.childNodes[9].value, this.parentNode.childNodes[11].value)" class="button tiny">Show Bounding Box</a>
				

			</div>
			<div id="t'.$d['id'].'" class="reveal-modal" data-reveal>
			<div id="EditCommentContainer">
			<p>Edit comment</p>
    			<div>
	 		<form action="commentSys/edit.php" method="post">
	    		 <p>Autor <input id="name1" type="text" readonly="readonly" name="name"/>

	   		 <label for="body">Edit</label>
            		 <textarea name="body1" id="body1" cols="20" rows="5">'.$d['body'].'</textarea>
            
	    		 <input type="hidden" name="id1" id="id1" value = '.$d['id'].' />
				 <input type="hidden" name="urleins" id="urleins" value = '.$d['page_id'].' />
	
	
			<button style="float: left;">Edit</button>
			</form>

<script>
document.getElementById("name1").value = author();
</script>
</div>
</div>
</div>

		';
	}

	public static function validate(&$arr)
	{
		/*
		/	This method is used to validate the data sent via AJAX.
		/
		/	It return true/false depending on whether the data is valid, and populates
		/	the $arr array passed as a paremter (notice the ampersand above) with
		/	either the valid input data, or the error messages.
		*/
		
		$errors = array();
		$data	= array();

		
		// Using the filter_input function introduced in PHP 5.2.0
		
		if(!($data['page_id'] = filter_input(INPUT_POST,'page_id',FILTER_CALLBACK,array('options'=>'Comment::validate_text'))))
		{

			
			$url_top = '';
		}
		if(!($data['leftpoint'] = filter_input(INPUT_POST,'leftpoint',FILTER_CALLBACK,array('options'=>'Comment::validate_text'))))
		{

			
			$leftpoint = '';
		}
		if(!($data['rightpoint'] = filter_input(INPUT_POST,'rightpoint',FILTER_CALLBACK,array('options'=>'Comment::validate_text'))))
		{

			
			$rightpoint = '';
		}
		
		
		// Using the filter with a custom callback function:
		
		if(!($data['body'] = filter_input(INPUT_POST,'body',FILTER_CALLBACK,array('options'=>'Comment::validate_text'))))
		{
			$errors['body'] = 'Please leave a comment.';
		}


		
		if(!($data['name'] = filter_input(INPUT_POST,'name',FILTER_CALLBACK,array('options'=>'Comment::validate_text'))))
		{
			$errors['name'] = 'Please leave your name.';
		}
		
		
		if(!($data['rating'] = filter_input(INPUT_POST,'rating',FILTER_CALLBACK,array('options'=>'Comment::validate_text'))))
		{
			$errors['rating'] = 'Please leave a rating.';
		}

		if(!empty($errors)){
			
			// If there are errors, copy the $errors array to $arr:
			
			$arr = $errors;
			return false;
		}
		
		// If the data is valid, sanitize all the data and copy it to $arr:
		
		foreach($data as $k=>$v){
			$arr[$k] = pg_escape_string($v);
		}
		
		// Ensure that the email is lower case:
		
		$arr['email'] = strtolower(trim($arr['email']));
		
		return true;
		
	}

	private static function validate_text($str)
	{
		/*
		/	This method is used internally as a FILTER_CALLBACK
		*/
		
		if(mb_strlen($str,'utf8')<1)
			return false;
		
		// Encode all html special characters (<, >, ", & .. etc) and convert
		// the new line characters to <br> tags:
		
		$str = nl2br(htmlspecialchars($str));
		
		// Remove the new line characters that are left
		$str = str_replace(array(chr(10),chr(13)),'',$str);
		
		return $str;
	}

}

?>
