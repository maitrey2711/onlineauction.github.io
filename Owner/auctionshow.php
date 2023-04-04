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
	<style type="text/css">
	 th{font-size:15px!important}
	 th{background-color:silver}
	</style>
	
  </head>	
  <body>
  <form name="frm" action="#" method="post">
    <div id="wrapper">
     <?php
	  include("header.php");
	?>
  	 <div id="container">
	   <div class="row"style="margin-bottom:10px">
		   <div class="col-md-1"></div>
			<div class="col-md-10"> <h3>SHOW AUCTION DETAILS</h3> </div>
	   </div>		
 		<div class="row">
		   <div class="col-md-1"></div>
			<div class="col-md-10">
		     <?php
			   $query="select auctionid,auctiondate,prdname,custname,price,description from auction a,product p,customer c where a.prdid=p.prdid and a.custid=c.custid";
			   $tb=$dc->getTable($query);
			   echo("<table class='table table-bordered'>");
			   echo("<tr>");
			     echo("<th>AUCTION ID</th>");
				 echo("<th>AUCTION DATE</th>");
				 echo("<th>PRODUCT NAME</th>");
				 echo("<th>CUSTOMER NAME</th>");
				 echo("<th>PRICE</th>");
				 echo("<th>DESCRIPTION</th>");
			   echo("</tr>");
			   while($rw=mysqli_fetch_array($tb))
			   {
				  echo("<tr>");
				  echo("<td>".$rw['auctionid']."</td>");
			      echo("<td>".$rw['auctiondate']."</td>");
				  echo("<td>".$rw['prdname']."</td>");
				  echo("<td>".$rw['custname']."</td>");
				  echo("<td>".$rw['price']."</td>");
				  echo("<td>".$rw['description']."</td>");
				  
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