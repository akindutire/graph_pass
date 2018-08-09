<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Graphical Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="menu_nav">
        
      </div>
    </div>
  </div>

  <div class="content" style="margin-top:120px;">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article">
       
          

          <div class="clr"></div>
          
          <div class="post_content" style="background:white; color:black;">
           <br><br><center>
              
           <!--<h1>Signatures</h1>-->
           <h4>Signature</h4>

           <?php

                $user = $_POST['usr'];

               echo "<input type='hidden' name='usr' value='$user' id='usr'>";

           ?>

           <table style="height:20px; width:20px; background:yellow;" id="tab1">
             
             <tr> 
                  <td style="background:yellow;"></td> 
                  
            </tr>

           </table>
           
            <div style="width:300px; height:30px; background:rgba(237, 59, 81, 0.88); " id="feedback"></div>


           <center><div id="img">

           <a id="green_spot" style="display:none; background: rgba(255, 255, 255, 0.68); border-radius:50%; height:25px; width:25px;"></a>
           
           <!--<div id='overlay' style="width:70%; height:inherit; background: rgba(0, 0, 0, 0.65); position:absolute; display:block; z-index:0;"></div>-->

           <ee>

            
            <?php $rand="bench".rand(1,5).".jpg"; 
            
             // echo "<img id='img_command' style='border:1px solid black; width:70%; height:50%;' src='../images/contents/$rand'>";

            ?>
            </ee>
            
              <br><br>
              <button type="button" id="btn_load_more" data-val="<?php echo $user; ?>" >Load Image</button>

           </div></center>


            </center>

          <br>             
          </div>

          


          <div class="clr"></div>
        </div>



        
      </div>
      <div class="sidebar">
        <div class="gadget">
          <h2 class="star"><span>Sidebar</span> Menu</h2>
          <div class="clr"></div>
          <ul class="sb_menu">

            <li><a href="index.php">Home</a></li>
            
          </ul>
        </div>
        
      <div class="clr"></div>
    </div>
  </div>
  <div class="fbg">
    <div class="fbg_resize">
      
            <div class="clr"></div>
    </div>
  </div>
  <div class="footer">
    <div class="footer_resize">
      <p class="lf">&copy; Graphical password  
      <div style="clear:both;"></div>
    </div>
  </div>
</div>
</body>
</html>
