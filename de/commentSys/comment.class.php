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

		if($d['name'] === "Gast") {	
		$avatar = '<img src="/../Simon/Master/img/CommentSys/Gast.gif" />';
	
		}  else   { 
			$avatar  = '<img src="/../Simon/Master/img/CommentSys/default_avatar.gif" />';
		}
			
		if($d['name'] === "$_COOKIE[Autor]") {	
		$edit = '<button type="submit" id="edit" data-reveal-id="Edit" >Bearbeiten</button>';
	
		}  else   { 
			$edit  = '';
		}
			
		return '
		
			
			
			<div class="comment">
				<div class="avatar">'.$avatar.'</div>			
				<div class="name">'.$d['name'].'</div>
				<div class="rating">'.$d['rating'].'</div>
				<div class="date" title="Added at '.date('H:i \o\n d M Y',$d['dt']).'">'.date('H:i \o\n d M Y',$d['dt']).'</div>
				<input type="hidden" value='.$d['leftpoint'].' />
				<input type="hidden" value='.$d['rightpoint'].' />
				<a onclick="drawBox(this.parentNode.childNodes[9].value, this.parentNode.childNodes[11].value)" class="button tiny">BBox auf der Karte Zeichnen</a>
				<p>'.$d['body'].'</p>
				'.$d['leftpoint'].'
				'.$d['rightpoint'].'
				'.$edit.'
				<input type="text" name="id" id="id" value = '.$d['id'].' />
	
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
			$errors['body'] = 'Bitte geben sie einen Kommentartext ein.';
		}


		
		if(!($data['name'] = filter_input(INPUT_POST,'name',FILTER_CALLBACK,array('options'=>'Comment::validate_text'))))
		{
			$errors['name'] = 'Bitte geben sie einen Namen an.';
		}
		
		
		if(!($data['rating'] = filter_input(INPUT_POST,'rating',FILTER_CALLBACK,array('options'=>'Comment::validate_text'))))
		{
			$errors['rating'] = 'Bitte geben sie eine Bewertung an.';
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
