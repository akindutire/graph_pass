// JavaScript Document
$(function(){
	
	var x=101,
	 fx=000,
	 r='<img src="../images/content/r.gif" height="auto" width="20px">',
	 c='<img src="../images/content/accept.png" height="auto" width="20px">';
	
	var data=Array();
	var udata=Array();
	var i=0;
	
			
	check_my_box=function(){
		
				
			$(this).find('input:checkbox').attr('checked','true');
			var ckno=$(this).find('input:checkbox').data('val');
			
			$('#feedback').css({background:'rgba(101, 169, 0, 0.86)'});

			var change=function(){
				$('#feedback').css({background:'rgba(237, 59, 81, 0.88)'});
				};

			setTimeout(change,200);
			
		} 	
			
	get_more_image=function(){

		var url='../resource/controller/retrieve.php';
		$('div ee').html("Loading...");

		var usr=$(this).data('val');

		$.post(url, {'retrieveid' :1, 'usr':usr },function(data){

			$('div#img ee').html(data);
			

		});
	}


	get_more_image_for_login=function(){

		var url='../resource/controller/retrieve.php';
		$('div ee').html("Loading...");

		var usr=$(this).data('val');

		$.post(url, {'retrieveid' :2, 'usr':usr },function(data){

			$('div#img ee').html(data);
			
			//<div style='width:400px; height:300px; background:rgba(0, 0, 0, 0.65); color:white; '>Already Set</div>
		});
	}


	set_point=function(e){


		var cur_offset=$(this).offset();

		var relativeX=(e.pageX-cur_offset.left);
		var relativeY=(e.pageY-cur_offset.top);
		var benchno=$(this).data('val');

		var mtop= e.pageY - 12.5;
		var mleft= e.pageX - 12.5;

		/*$('#overlay').css({'display':'block','position':'absolute','top':0,'left':0}).fadeIn('fast').delay(500);*/

		$('#green_spot').css({'display':'block','position':'absolute','top':mtop,'left':mleft}).fadeIn('slow').delay(500).fadeOut('slow');

		var usr = $('#usr').val();

		var conf=confirm("Do you want to set this Point");

		if (conf == true) {

			$.post('../resource/controller/add.php',{ 'addid':1 , 'benchno':benchno, 'x':relativeX, 'y':relativeY, 'usr':usr },function(data){

				if (data == x) {

						i+=1;
						
						$('table tr td').html("<b>"+i+"</b>"); 

						$('#feedback').css({background:'rgba(101, 169, 0, 0.86)'});

						var change=function(){
							$('#feedback').css({background:'rgba(237, 59, 81, 0.88)'});
						};

					setTimeout(change,200);
			
						if (i == 5) {

							alert('Maximum Point Checked, Account Created ');
						};
				}else{

					alert(data);
				}
			});

		}else{
			return null;
		}
		
	}

	set_point_for_login=function(e){


		var cur_offset=$(this).offset();

		var relativeX=(e.pageX-cur_offset.left);
		var relativeY=(e.pageY-cur_offset.top);
		var benchno=$(this).data('val');

		var mtop= e.pageY - 12.5;
		var mleft= e.pageX - 12.5;

		

		/*$('#overlay').css({'display':'block','position':'absolute','top':0,'left':0}).fadeIn('fast').delay(500);*/

		$('#green_spot').css({'display':'block','position':'absolute','top':mtop,'left':mleft}).fadeIn('slow').delay(500).fadeOut('slow');

		var usr = $('#usr').val();

						
		
			$.post('../resource/controller/add.php',{ 'addid':2 , 'benchno':benchno, 'x':relativeX, 'y':relativeY, 'usr':usr },function(data){

				var url='../resource/controller/retrieve.php';
						$('div ee').html("Loading...");

						$.post(url, {'retrieveid' :2, 'usr':usr },function(data){

							$('div#img ee').html(data);
			
							//<div style='width:400px; height:300px; background:rgba(0, 0, 0, 0.65); color:white; '>Already Set</div>
						});

				if (data == x) {

					//console.log(typeof(udata[be]));	
						
					if  (udata.indexOf(benchno) >= 0 ) {

						alert('Object Already Validated');

					}else{

						udata.push(benchno);
						
						i+=1;
						
						$('h2').html(i+" Matched Point"); 

						$('#feedback').css({background:'rgba(101, 169, 0, 0.86)'});

						var change=function(){
							$('#feedback').css({background:'rgba(237, 59, 81, 0.88)'});
						};

						setTimeout(change,200);



						if (i == 5) {

							window.location="index.php?q=cpanel";
						}

					}


						
			

				}else{

					$('#feedback').css({background:'rgba(0, 0, 0, 0.79)'});

						var change=function(){
							$('#feedback').css({background:'rgba(237, 59, 81, 0.88)'});
						};

					setTimeout(change,200);

					alert(data);
				}
			});
		
	}
/************************End Function*************************************/


/* **********************|Binders|****************************************** */
	
	$('table').on('click','tr td',check_my_box);
	$('button#btn_load_more').bind('click',get_more_image);
	
	$('button#btn_load_more2').bind('click',get_more_image_for_login);

	$('ee').on('click','img#img_command',set_point);

	$('ee').on('click','img#img_command2',set_point_for_login);
	
	
});