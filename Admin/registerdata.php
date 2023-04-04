<HTML>
  <HEAD>
   <?php
     session_start();
     include("csslink.php"); 
     include("../class/DataClass.php");
      $dc=new DataClass();
   ?>
  </HEAD>
  <BODY class="fixed-nav sticky-footer bg-dark" id="page-top">
  <?php
 include("navbar.php");
?>
    <div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
		<div class="col-xl-12">
		 
	
     <?php
	   $query="select * from register";
	   $tb=$dc->getTable($query);
	   echo("<table class='table table-bordered'>");
	   echo("<tr>");
	   echo("<td>ID</td><td>DATE</td><td>NAME</td><td>PASSWORD</td><td>TYPE</td>");
	   echo("<tr>");
	   while($rw=mysqli_fetch_array($tb))
	   {
		 echo("<tr>");
         echo("<td>".$rw['regid']."</td>");
		 echo("<td>".$rw['regdate']."</td>");
		 echo("<td>".$rw['username']."</td>");
		 echo("<td>".$rw['password']."</td>");
		 echo("<td>".$rw['usertype']."</td>");
		 echo("</tr>");
	   }
	   echo("</table>");
	 ?>
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