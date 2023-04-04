<html>
  <head>	
    <?php
	  session_start(); 
	  include("../class/DataClass.php");
	  include("cssfiles.php");
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
		   <div class="span3"></div>
			<div class="span6">
			<h3>Purchase DETAILS
            
			</h3> 
			</div>
	   </div>		
 		<div class="row">
		   <div class="span3"></div>
			<div class="span6">
		     <?php
			   $query="select purid,purdate,prdid,auctionprice,purchaseprice,auctionid,regid,remark from purchase";
			   $tb=$dc->getTable($query);
			   echo("<table class='table table-bordered'>");
			   echo("<tr>");
			     echo("<th>PURID</th>");
				 echo("<th>PURDATE</th>");
				 echo("<th>PRDID</th>");
				 echo("<th>AUCTIONPRICE</th>");
				 echo("<th>PURCHASEPRICE</th>");
				 echo("<th>AUCTIONID</th>");
				 echo("<th>REGID</th>");
				 echo("<th>REMARK</th>");
			   echo("</tr>");
			   while($rw=mysqli_fetch_array($tb))
			   {
				  echo("<tr>");
			      echo("<td>".$rw['purid']."</td>");
				  echo("<td>".$rw['purdate']."</td>");
				  echo("<td>".$rw['prdid']."</td>");
				  echo("<td>".$rw['auctionprice']."</td>");
				  echo("<td>".$rw['purchaseprice']."</td>");
				  echo("<td>".$rw['auctionid']."</td>");
				  echo("<td>".$rw['regid']."</td>");
				  echo("<td>".$rw['remark']."</td>");
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
	  include("jsfiles.php");
	?>
   </body>
 </html>