<?php

namespace cliqsFrameWork\ic;



define('EXKIT','../resource/tracks/exp.bmp');
define('UPKIT','../resource/tracks/update.txt');
define('SIKIT','../resource/tracks/silent.bmp');
define('RELOCATEKITDIRECTORY','../resource/tracks/silent.bmp');
define('IMG','../images/content/');




/*-----------------------------------------
|	This Class Makes Database Connection
|------------------------------------------
|
|
*/


class connect{
	
	public static function iconnect(){

		global $config;
		
		
		$def 	=	$config['con']['default'];

		if($def=='mysqli'){

			$link	=	mysqli_connect(	$config['con'][$def]['host'] , $config['con'][$def]['username'] , $config['con'][$def]['password'] , $config['con'][$def]['database']	);
		}
			
			if($link){
			
				return $link;
			
			}else{
			
				die("System Currently Not Available, Try Again Later");
			
				}
		}
	
}


/*-----------------------------------------
|	This Class Create Database Query
|-------------------------------------------
|
|
*/

class cq{

	public static function redirect($url){

				$url=filter_var($url,FILTER_SANITIZE_URL);

				header("location:$url");
			}


	public static function insert($table,$db){

		//$link=connect::iconnect();

		$dbfield=array();		
		$variable=array();

		$idbf='';
		$ivar='';
		$sql='';
		$i=0;
		
		foreach ($db as $dbval => $prval) {
			
			array_unshift($dbfield, $dbval);
				
			array_unshift($variable, $prval);

		}

		$all_size=count($dbfield);
		
		$sql.="INSERT INTO $table(";
		
			while($dbf=array_shift($dbfield)){

				$i++;
				$idbf.=$i==$all_size?$dbf:$dbf.',';			
				
			}			

		$sql.=$idbf;

		$sql.=") VALUES(";
			
			$i=0;
			while($var=array_shift($variable)){

				$i++;
				$ivar.=$i==$all_size? "'".$var."'":"'".$var."'".',';

			}	
		
		$sql.=$ivar.")";

		return $sql;
	}

	public static function stmtinsert($table,$db){


		$dbfield=array();		
		$variable=array();

		$idbf='';
		$slot='';
		$sql='';
		$i=0;
		
		foreach ($db as $dbval => $prval) {
			
			array_unshift($dbfield, $dbval);
				
		}

		$all_size=count($dbfield);
		
		$sql.="INSERT INTO $table(";
		
			while($dbf=array_shift($dbfield)){

				$i++;
				$idbf.=$i==$all_size?$dbf:$dbf.',';			
				
			}			

		$sql.=$idbf;

		$sql.=") VALUES(";
			
			
			for($i=0;$i<$all_size;$i++){
				
				$c='?';
				$slot.=$i==($all_size-1)?$c:$c.',';

			}	

		
		$sql.=$slot.")";

		return $sql;

	}

	public static function delete($table,$db,$binder,$type=1){

		$dbfield=array();		
		$idbf='';
		$sql='';
		$i=0;
		

		if($type==1){

			foreach ($db as $dbval => $prval) {
			
				array_unshift($dbfield, $dbval);
				
			}

			$all_size=count($dbfield);
		
			$sql.="DELETE FROM $table WHERE ";
		
			while($dbf=array_shift($dbfield)){

				$i++;
				$idbf.=$i==$all_size?"$dbf='$db[$dbf] '":"$dbf='$db[$dbf]' $binder ";			
				
			}			

		$sql.=$idbf;


		}else{

			$sql.="DELETE FROM $table";

		}
		
		return $sql;

	}

	public static function truncate($table){

		$sql="TRUNCATE $table";
		return $sql;
	}

	public static function select($table,$db,$binder,$type=1){

		$dbfield=array();		
		$idbf='';
		$sql='';
		$i=0;
		

		if($type==1){

			foreach ($db as $dbval => $prval) {
			
				array_unshift($dbfield, $dbval);
				
			}
			
			$all_size=count($dbfield);
		
			$sql.="SELECT * FROM $table WHERE ";
		
			while($dbf=array_shift($dbfield)){

				$i++;
				$idbf.=$i==$all_size?"$dbf='$db[$dbf]'":"$dbf='$db[$dbf]' $binder ";			
				
			}			

			$sql.=$idbf;


		}else{

			$sql.="SELECT * FROM $table";

		}
		
		return $sql;
	}

	public static function update($table,$db,$dbcond,$binder,$type=1){

		$dbfield=array();
		$icond=array();		
		$idbf='';
		$iconf='';
		$sql='';
		$i=0;
		

		

			foreach ($db as $dbval => $prval) {
			
				array_unshift($dbfield, $dbval);
				
			}

			
			$all_size=count($dbfield);
			
			
			$sql.="UPDATE $table SET ";
		
				while($dbf=array_shift($dbfield)){

					$i++;
					$idbf.=$i==$all_size?"$dbf='$db[$dbf]'":"$dbf='$db[$dbf]',";			
				
				}			

				$sql.=$idbf;

			if($type==1){

				foreach ($dbcond as $dbval => $condval) {
			
					array_unshift($icond, $dbval);
					
				}

				$sql.="WHERE ";

				$cond_size=count($icond);
				$i=0;
				while($icon=array_shift($icond)){

					$i++;
					$iconf.=$i==$cond_size?"$icon='$dbcond[$icon]' ":"$icon='$dbcond[$icon]' $binder ";			
				
				}			

				$sql.=$iconf;

				return $sql;

			}else{

				return $sql;
				
			}		
			
	}
}

/*-----------------------------------------
|	This Class Checks The System Integrity
|-------------------------------------------
|
|
*/

class performance{
	
	public function sanitize($var){
		
		$var=htmlentities(stripslashes(strip_tags($var)));
		return $var;

	}


	public function checkSys(){
		
		$link=connect::iconnect();

		$db=array(

			'st'	=>	1

			);

		$query=cq::select('performancetab',$db,'AND',1);

		$sql=mysqli_query($link,$query) or die('101xFc: Unknown Reference');

		list($id,$start,$exp,$istatus,$lastmin)=mysqli_fetch_row($sql);
	
		if(mysqli_num_rows($sql)==0 && file_exists(EXKIT)==false){ 
			
			
			
			$this->createTrial(6);
		

		}else if(file_exists(EXKIT)==false){
		
		
			$this->repairTrial($exp,$lastmin);
		
		}else if($exp=='LP'){
		
			echo '';
		
		}else{
		
			$this->updateTrial($exp,$lastmin);
		
			}
	}
	
	//Inter Fc
	
	private function createTrial($trial){
		$link=connect::iconnect();
		
		//@Db Salt;
		$salt='cliqsdiamond';
		
		
		$start=date(time());
		$exp=date(strtotime("+ $trial month"));
		
		$fd=fopen(EXKIT,'w+');
		fwrite($fd,$exp);
		
		$db=array_reverse(array(

			'id'	=>	'NULL',
			'ifr'	=>	$start,
			'tg'	=>	$exp,
			'st'	=>	1,
			'lm'	=>	$start,
			
			));

		$query=cq::insert('performancetab',$db);

		mysqli_query($link,$query);

	}
	
	private function repairTrial($exp,$lastmin){
		
		$link=connect::iconnect();
		
		$fd=fopen(EXKIT,'w+');
		fwrite($fd,$exp);

		$db=array_reverse(array(

			'lm'	=>	$lastmin

			));

		$dbcond=array_reverse(array(

			'id'	=>	1,
			'st'	=>	1
			

			));

		$query=cq::update('performancetab',$db,$dbcond,'AND',1);
		mysqli_query($link,$query);

		
		}
	
	private function updateTrial($exp,$lastmin){
		
		$link=connect::iconnect();
		
		$inow=date('d M Y, H:i a',time());
		
		$now=date(time());
		
			if($lastmin>$now){

				die('System/PC Time Inaccurate, Please Adjust Your Date,$inow');
			
			}else if($now>=$lastmin){
				
				file_exists(SIKIT)?'':die('Application Error: Some Modules Unable To Load, 01xfxc1');
				
				if($now>$exp){
							
					@rename(SIKIT,RELOCATEKITDIRECTORY);
					die('Unexpected Reference 101xF, Strongly Recommend Contacting App Provider.');
						
				}else{
					$new_min=date(time());
					
					$db=array_reverse(array(

						'lm'	=>	$new_min

					));

					$dbcond=array_reverse(array(

						'id'	=>	1,
						'st'	=>	1

					));

					$query=cq::update('performancetab',$db,$dbcond,'AND',1);


					mysqli_query($link,$query);
				}	
			}
		}
	
	
	public function AppWriter($data){
		
		$time=date('d M Y, H:i a',time());
		$data="[$time]->$data\n
		----------------------------------------------------------------------------------";
		
		
		file_exists(UPKIT)?'':die('Application Error: Some Modules Unable To Load, 01xfxc2');
		
		$fd=fopen(UPKIT,'a+');
		fwrite($fd,$data);
		fclose($fd);
	}
	//End Inter Fc
		
}




/*-----------------------------------------
|	This Class is Called YALL .
|------------------------------------------
|	Coz it takes care of all basic functions and routing on the app
|
*/

class yall{
	
	public function login($usr,$pwd){
		global $config;

		$link=connect::iconnect();
		
		$db=array_reverse(array(
			
			'mat'		=>	mysqli_real_escape_string($link,$usr),
			'password'	=>	mysqli_real_escape_string($link,$pwd),
			'bk'		=>	0
			
			));

		$query=cq::select('users',$db,'AND');


		$sql=mysqli_query($link,$query);
		
		if(mysqli_num_rows($sql)==1){
			
			//$data="$usr LOGGED IN Through ".$_SERVER['HTTP_USER_AGENT'].' On A '.$_SERVER['HTTP_CONNECTION'].' Connection';
			
			$_SESSION['iusr']=$usr;
			$_SESSION['ipwd']=$pwd;
			
			//performance::AppWriter($data);
			echo $config['flag']['sx'];

		}else{
			
			printf("<img src='%scancel.png' width='auto' height='14px'>&nbsp;Invalid Combination",IMG);
			
			}
		
		}
		
	public function getdata(){
		global $config;

		$link=connect::iconnect();

		$usr=$_SESSION['iusr'];
		$pwd=$_SESSION['ipwd'];	
		$db=array_reverse(array(
			
			'mat'		=>	mysqli_real_escape_string($link,$usr),
			'password'	=>	mysqli_real_escape_string($link,$pwd)
			
			));

		
			$query=cq::select('users',$db,'AND',1);
		
			$sql=mysqli_query($link,$query);
		
			list($id,$role,$e,$e,$e,$e,$e,$e,$e,$e,$e)=mysqli_fetch_row($sql);
			$_SESSION['role']=$role;
			
			return $id;
		}
		
		
	public function logout($admin){
		global $config;
		
			
			$_SESSION[]=array();
			session_unset();
			
			$usr=$_SESSION['iusr'];
			
			

		if($admin!=1){

			cq::redirect($config['view']['root']);
	
		}else{
			
			cq::redirect($config['view']['root']);
			
			}

		}	
		
	
	public function verifylogin($role,$logintypeID){
		global $config;

		$usr_id=$this->getdata();
		$role=strtolower($role);
		


		if($_SESSION['role']==$role){
			
			echo '';

			
			
		}else{
				if($logintypeID==null)
					$this->logout();
				else
					$this->logout(1);
			}		
		}
		
	public function haveexternalrights(){
		global $config;
		
		$link=connect::iconnect();

		$usr_id=$this->getdata();
		
		$db=array_reverse(array(
			
			'id'	=>	mysqli_real_escape_string($link,$usr_id)
			
			));

		$query=cq::select('users',$db,'AND',1);
		$sql=mysqli_query($link,$query);
		
		list($e,$e,$e,$e,$e,$e,$e,$e,$e,$ex,$e)=mysqli_fetch_row($sql);
			
			return $ex;
		}
	
	public function generate_five_square_random_color_box_of_checkbox(){

		global $config;
		$link=connect::iconnect();
		
		$sql=mysqli_query($link,"SELECT * FROM  Pattern_tabs ORDER BY RAND() LIMIT 0,16");
		
		
		while(list($id,$picture,$key)=mysqli_fetch_row($sql)){
			$picture=strtolower($picture);
			$picture="../images/contents/".$picture;

				echo " <td style='background:url($picture); width:100px; height:80px;'> <input type='checkbox' style='display:none;' name='pwd[]' id='pwd' value='$key' data-val='$key'> </td>";	
		}	
	}
	
	public function login_signature($usr,$x,$y,$benchno){

		global $config;
		$link=connect::iconnect();

		//echo $c;

		$x1=$x + 25;
		$x2=$x - 25;

		$y1=$y + 25;
		$y2=$y - 25;

		$cols="b".$benchno;

		
		$sql=mysqli_query($link,"SELECT $cols FROM signature WHERE usr='$usr'");
		
		list($point)=mysqli_fetch_row($sql);
		
		
		
			$ty=explode(',', $point);
			$cv=  array();

			foreach ($ty as $k => $a) {
				$cv[$k]=$a;
			}

			if ( ($cv[0] <= $x1 && $cv[0] >= $x2) && ($cv[1] <= $y1 && $cv[1] >= $y2) ) {
				
				$_SESSION['c']=1;
				echo $config['flag']['sx'];

			}else if ($cv[0] == $x && $cv[1] == $y) {
				
				
				echo $config['flag']['sx'];

			}else{

				echo "Incorrect Point , Please Retry";
			}	
		
	}

	public function add_signature($usr,$x,$y,$benchno){

		global $config;
		$link=connect::iconnect();

		$db=array_reverse(array(

			'id'	=>	'NULL',
			'usr'	=>	$usr,
			'sig'	=>	'NULL',
			'b1'		=>	'NULL',
			'b2'		=>	'NULL',
			'b3'		=>	'NULL',
			'b4'		=>	'NULL',
			'b5'		=>	'NULL'
			
			));

		$sqlp=mysqli_query($link,"SELECT usr FROM signature WHERE usr='$usr'");

		if ( mysqli_num_rows($sqlp) == 1 ) {
	
			$cols="b".$benchno;
			$col_val=$x.",".$y;

				$ui=mysqli_query($link,"SELECT $cols FROM signature WHERE $cols ='NULL'");

				if (mysqli_num_rows($ui)==1) {
					$sql=mysqli_query($link,"UPDATE signature SET $cols='$col_val' WHERE usr='$usr'");
					
					if ($sql) {
			
					echo $config['flag']['sx'];

					}else{

						echo "System Error, Please Retry";
					}

				}else{

					echo "You Already Set A Point";
				}
			
		}else{
			
			$gsql=mysqli_query($link,cq::insert('signature',$db));

			if ($gsql) {
				
				$cols="b".$benchno;
				$col_val=$x.",".$y;

				$ui=mysqli_query($link,"SELECT $cols FROM signature WHERE $cols ='NULL'");

				if (mysqli_num_rows($ui)==1) {
					$sql=mysqli_query($link,"UPDATE signature SET $cols='$col_val' WHERE usr='$usr'");
					
					if ($sql) {
			
					echo $config['flag']['sx'];

					}else{

						echo "System Error, Please Retry";
					}

				}else{

					echo "You Already Set A Point";
				}
			

			}else {
				echo "System Error , Please Retry";
			}
		}
	}


	public function addsomething($a){

		global $config;
		$link=connect::iconnect();

		$db=array_reverse(array(

			'dbfield'	=>	'parameter',
			'dbfield'	=>	'parameter',
			'dbfield'	=>	'parameter',
			'dbfield'	=>	'parameter',

			));

		$sql=mysqli_query($link,cq::insert('tablename',$array_param));

		if ($sql) {
			
			echo $config['flag']['sx'];

		}else{

			echo "System Error, Please Retry";
		}
	}


}

/*-----------------------------------------
|	This Class is Called Records .
|------------------------------------------
|	be it admin or client ,this class always retrieve 
|	any stored process or data from our default data-
|	base	made earliar on YALL
|
*/


class records{
	
	

}//End Of Records




?>