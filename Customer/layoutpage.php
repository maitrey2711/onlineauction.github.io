<HTML>
<HEAD>
   <?php
	  session_start();
	  include("../class/DataClass.php");
	  include("csslink.php");
	?>
	
	<?php
	    $msg="";
	    $dc=new DataClass();
	?>
</HEAD>
<HTML>
<BODY>
<div id="wrapper">
  <?php
   include("header.php");
  ?>
  <form name="frm" action="#" method="post">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
		
		</div>
	  </div>
	 </div>
  
  
  </form>
  
  <?php
   include("footer.php");
  ?>
  
 </div> 
 <?php
 include("jslink.php");
?> 
</BODY>
</HTML>

	