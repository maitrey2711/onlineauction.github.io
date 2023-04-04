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
<BODY>
<form name="frm" action="#" method="post">
<div id="wrapper">
  <?php
   include("header.php");
   include("slider.php");
  ?>
   		
 <div class="container">
      <div class="row">
        <div class="col-md-12">
		
		</div>
	  </div>
 </div>
 
<?php
 include("footer.php");
?>
</div>
</form>
<?php
 include("jslink.php");
?>
</BODY>
</HTML>
