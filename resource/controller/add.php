<?php
	
	namespace cliqsFrameWork\add;
	
	include_once('../../bootstrap/pageinit.php');
	//include_once('../../config/config.php');
	include_once('../class/users.php');
	
	use cliqsFrameWork\ic\yall as me;
	use cliqsFrameWork\ic\connect as connect;
	use cliqsFrameWork\ic\performance as ivalid;
	
	
	function redirect($url){

				$url=filter_var($url,FILTER_SANITIZE_URL);

				header("location:$url");
	}

	$me			=	new me();
	$connect	=	new connect();
	$check  	=	new ivalid();
	

	
		$ad=(int)filter_var(strip_tags(trim($_POST['addid'])),FILTER_VALIDATE_INT);

		if($ad==1){
			
			//'addid':1 , 'x':relativeX, 'y':relativeY, 'usr':usr, benchno
			

			$usr=$check->sanitize($_POST['usr']);
			
			$x=$_POST['x'];

			$y=$_POST['y'];

			$benchno=$_POST['benchno'];

				$me->add_signature($usr,$x,$y,$benchno);

		}else if($ad==2){

			//'addid':2 , 'benchno':benchno, 'x':relativeX, 'y':relativeY, 'usr':usr

			$usr=$check->sanitize($_POST['usr']);

			$x=$_POST['x'];

			$y=$_POST['y'];

			$benchno=$_POST['benchno'];

				$me->login_signature($usr,$x,$y,$benchno);

			
			
		}
	


?>