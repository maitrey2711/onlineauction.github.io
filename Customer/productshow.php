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
	
  <?php
   if(isset($_POST['btndetails']))
   {
     $id=$_POST['btndetails'];
	 $_SESSION['prdid']=$id;
	 header("location:productdetails.php");
   }
 ?>
	
  </head>	
  <body>
  <form name="frm" action="#" method="post">
   <div id="wrapper">
   <?php
    include("header.php");
   ?>
   
  	 <div class="container">
	   <div class="row" style="margin-top:20px">
		   <div class="col-md-12"> <h3>PRODUCT</h3></div>
	   </div>		
	   
 		<div class="row">
		   	<div class="col-md-12">
		     <?php
			   $query="select prdid,prdname,image,company from product";
			   $tb=$dc->getTable($query);
			   
			    while($rw=mysqli_fetch_array($tb))
				 {
					$prdid=$rw['prdid']; 
					echo( "<div class='col-md-3'>"); 
					echo( "<table class='table'>"); 
						echo("<tr><td colspan='2'><img src='../owner/productimages/".$rw['image']."' style='width:100%;height:200px'></td></tr>");  
						echo("<tr><td>Name ".$rw['prdname']."</td>");
						echo("<td rowspan='2' style='text-align:right;vertical-align:middle'><button name='btndetails' value=".$prdid.">Details</button></td></tr>"); 				
						echo("<tr><td>Company : ".$rw['company']."</td></tr>"); 

					echo( "</table>"); 
					echo("</div>");
				 }
				?>

				
				
			</div>
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