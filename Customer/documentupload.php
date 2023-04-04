<html>
  <head>	
    <?php
	  session_start(); 
	  include("../class/DataClass.php");
	  include("csslink.php");
	?>
	<?php
	  $msg="";
	  $dc=new DataClass();
	?>
	
	
  </head>	
  <body>
  <form name="frm" action="#" method="post">
    <div id="wrapper">
     <?php
	  include("navbar.php");
	?>
  	 <div class="container">
	   <div class="row"style="margin-bottom:20px">
		   <div class="col-md-3"></div>
			<div class="col-md-6">
			<h3>DOCUMENT UPLOAD
            <button type='submit' class="btn btn-primary pull-right"  name='btnnew'>SELECT</button>
			</h3> 
			</div>
	   </div>		
 		<div class="row">
		   <div class="col-md-3"></div>
			<div class="col-md-6">
		     <?php
			   $query="select docname,submitdate,doctype,purpose,regid from document";
			   $tb=$dc->getTable($query);
			   echo("<table class='table table-bordered'>");
			   echo("<tr>");
			     echo("<th>ID</th>");
				 echo("<th>DOCNAMENAME</th>");
				 echo("<th>SUBMITDATE</th>");
				 echo("<th>DOCTYPE</th>");
				 echo("<th>PURPOSE</th>");
				 echo("<th>REGID</th>");
			   echo("</tr>");
			   while($rw=mysqli_fetch_array($tb))
			   {
				  echo("<tr>");
			      echo("<td>".$rw['docid']."</td>");
				  echo("<td>".$rw['docname']."</td>");
				  echo("<td>".$rw['submitdate']."</td>");
				  echo("<td>".$rw['doctype']."</td>");
				  echo("<td>".$rw['purpose']."</td>");
				  echo("<td>".$rw['regid']."</td>");
				  echo("</tr>");
			   }
			    echo("<td colspan='6'>".$msg."</td>");
	           echo("</table>");
	         ?>		
				
				
			</div>
		</div>
		<?php
		  include("footer.php");
		?>
	 </div>	
	 </div>
   </div>
   </form> 
    <?php
	  include("jslink.php");
	?>
   </body>
 </html>