<html>
  <head>	
    <?php
	  session_start(); 
	  include("../class/DataClass.php");
	  include("csslink.php");
	?>
	<?php
	  $dc=new DataClass();
	?>
	
		   
    </head>	
  <body>
  <form name="frm" action="#" method="post">
    <div id="wrapper">
     <?php
	  include("navbar.php");
	  include("sidebar.php");
	?>
	
  	<div class="content-wrapper">
    <div class="container-fluid">
        
		
	   <div class="row"style="margin-bottom:10px">
		   <div class="col-md-1"></div>
			<div class="col-md-10">
			<h3>FEEDBACK DETAILS 
			</h3>
			</div>
	   </div>		
 		<div class="row">
		   <div class="col-md-1"></div>
             <div class="col-md-10">
		     <?php
			   $query="select feedbackid,feedbackdate,regid,ratingstar from feedback";
			   $query="select * from feedback";
			   $tb=$dc->getTable($query);
			   echo("<table class='table table-bordered'>");
			   echo("<tr>");
			     echo("<th>FEEDBACKID</th>");
				 echo("<th>FEEDBACKDATE</th>");
				 echo("<th>RATINGSTAR</th>");
				 echo("<th>FEEDBACKFOR</th>");
			   echo("</tr>");
			   while($rw=mysqli_fetch_array($tb))
			   {
				  echo("<tr>");
			      echo("<td>".$rw['feedbackid']."</td>");
				  echo("<td>".$rw['feedbackdate']."</td>");
				  echo("<td>".$rw['ratingstar']."</td>");
				  echo("<td>".$rw['feedbackfor']."</td>");
				  echo("</tr>");
			   }
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