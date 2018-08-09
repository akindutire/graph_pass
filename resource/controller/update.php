<?php

	namespace cliqsFrameWork\update;
	
	include_once('../../bootstrap/pageinit.php');
	include_once('../class/users.php');
	
	use cliqsFrameWork\ic\yall as me;
	use cliqsFrameWork\ic\connect as connectme;
	use cliqsFrameWork\ic\performance as ivalid;
	
	
	function redirect($url){

				$url=filter_var($url,FILTER_SANITIZE_URL);

				header("location:$url");
	}


	$me			=	new me();
	$connect	=	new connectme();
	$check  	=	new ivalid();
	

	
		$up=$_POST['upid'];
		if($up==1){
			//'upid':1,'fname':fname,'lname':lname,'tel':tel
			
			$fname=$check->sanitize($_POST['fname']);
			$lname=$check->sanitize($_POST['lname']);
			$tel=$check->sanitize($_POST['tel']);
			$uid=$me->getdata();

			$me->update_admin_profile($uid,$fname,$lname,$tel);

		}else if($up==2){

			$ipwd=sha1($check->sanitize($_POST['ipwd']));
			$npwd=sha1($check->sanitize($_POST['npwd']));
			$cpwd=sha1($check->sanitize($_POST['cpwd']));
			
			$me->cpp($ipwd,$npwd,$cpwd,$_POST['npwd']);
			
			
		}else if($up==3){

			//'upid':3,'uid':id

			$uid=$check->sanitize($_POST['uid']);

			$me->update_user_profile_set_ext_right($uid);

		}else if($up==4){

			//'upid':4,'dpts':dpts,'context':context

			$id=$check->sanitize($_POST['dpts']);
			$context=htmlentities(strip_tags($_POST['context'],'<b>,<p>,<a>,<img>,<i>,<blockquote>,<u>,<hr>'));

			$me->update_dpt_context($id,$context);			
			
		}else if($up==5){

			//'upid':5,'news':news,'context':context

			$id=$check->sanitize($_POST['news']);
			$context=htmlentities(strip_tags($_POST['context'],'<b>,<p>,<a>,<img>,<i>,<blockquote>,<u>,<hr>'));

			$me->update_news_context($id,$context);	
			
		}else if($up==6){
			
		}else if($up==7){
			
		}else if($up==8){
			
		}else if($up==9){
			
		}
	


?>