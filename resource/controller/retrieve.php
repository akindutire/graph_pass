<?php
	
	namespace cliqsFrameWork\retrieve;
	
	include_once('../../bootstrap/pageinit.php');
	include_once('../class/users.php');
	
	use cliqsFrameWork\ic\yall as me;
	use cliqsFrameWork\ic\connect as connect;
	use cliqsFrameWork\ic\performance as ivalid;
	use cliqsFrameWork\ic\records as record;

	function redirect($url){

				$url=filter_var($url,FILTER_SANITIZE_URL);

				header("location:$url");
	}

	$me			=	new me();
	$connect	=	new connect();
	$check  	=	new ivalid();
	$record  	=	new record();

			
			
		$rv=(int)filter_var(strip_tags(trim($_POST['retrieveid'])),FILTER_VALIDATE_INT);
		
		if($rv==1){
			
			//'retrieveid':1,'newsthread':newsthread
			 $link=$connect->iconnect();
			 $urand=rand(1,5);
			 $rand="bench".$urand.".jpg"; 
            
            $usr=$_POST['usr'];

            $col="b".$urand;

            $gh=mysqli_query($link,"SELECT * FROM signature WHERE usr='$usr'");
            if (mysqli_num_rows($gh) == 0) {
    
            	echo "<img data-val='$urand' id='img_command'style='border:1px solid black; width:70%; height:50%;' src='../images/contents/$rand'>";
		
            }else{

	            $sqld=mysqli_query($link,"SELECT * FROM signature WHERE $col = 'NULL' and usr='$usr'");
    	        if (mysqli_num_rows($sqld)==1) {
//echo $col;
        	    	echo "<img data-val='$urand' id='img_command'style='border:1px solid black; width:70%; height:50%;' src='../images/contents/$rand'>";
	
            	}else{

    				echo "<div style='width:400px; height:300px; background:rgba(0, 0, 0, 0.65); color:white; '>Already Set</div>";
	        	
            	}
              

            }

          

		}else if($rv==2){
			
			//'retrieveid':2,'state':state
			
			 $link=$connect->iconnect();
			 $urand=rand(1,5);
			 $rand="bench".$urand.".jpg"; 
            
            $usr=$_POST['usr'];

            $col="b".$urand;
	
            echo "<img data-val='$urand' id='img_command2'style='border:1px solid black; width:70%; height:50%;' src='../images/contents/$rand'>";
	
        	
		}else if($rv==3){
			
			//'retrieveid':3,'uid':id

			
		}else if($rv==4){

		
		}else if($rv==5){
			
		
		}
       

			
		
		
	
	exit();
?>