<html>
 <head>
 <?php
	  session_start();
	  include("../class/DataClass.php");
	  include("csslink.php");
	?>
	
 
 <?php
   $prdid="";
   $prdname="";
   $company="";
   $image="";
   $adddate="";
   $startdate="";
   $enddate="";
   $expprice="";
   $dc=new DataClass();
  ?>
  
   <?php
	 if(isset($_POST['btnauction']))
	 {
	    header('location:auction.php');
	 }
	 
	 if(isset($_POST['btnproduct']))
	 {
	   header('location:product.php');
	 }
		 
   ?>

 <style type="text/css">
   td{border-top:none!important;}
 </style>
 
 </head>
 <body>

 <form name="frm" action="#" method="post">
  <div id="wrapper">
     <?php
	  include("header.php");
	?>
 
 
 
<section id="content">
	<div class="container"> 
	  
	  <?php
		 if(($_SESSION['prdid'] != '') || (isset($_SESSION['prdid']))) 
		 {
		   $prdid=$_SESSION['prdid'];
		   $query="select * from product where prdid='$prdid'";
		   $rw=$dc->getRecord($query); 					 
		   $prdname=$rw['prdname'];
		   $cmpname=$rw['company'];
		   $image=$rw['image'];
		   $adddate=$rw['adddate'];
		   $startdate=$rw['startdate'];
		   $enddate=$rw['enddate'];
		   $expprice=$rw['expprice'];
		  }
	   ?>	

	  <div class="row">
       <div class="col-md-12" style="margin-top:20px"><h3>Product Details</h3></div>
	  </div> 
	   
	   <div class="row panel1" >
	  	
		<div class="col-md-6">
		 <?php
		   echo("<img src='../owner/productimages/".$image."' style='width:100%;height:350px'>");  
		 ?>
		</div>

		<div class="col-md-6">
		
		<table class='table'>
		  <tr><td colcol-md-='2'><col-md- class='heading1'><h5>PRODUCT DETAILS</h5></col-md-></td></tr>		  
		  <tr>
		    <td style='width:40%'>Product Name</td> <td> :&nbsp;&nbsp; <?php echo($prdname) ?></td>
		  </tr>
		  <tr>
		    <td style='width:40%'>Company</td><td>:&nbsp;&nbsp;<?php echo($cmpname) ?></td>
		 </tr>
		 <tr>
		    <td style='width:40%'>Add Date</td><td>:&nbsp;&nbsp;<?php echo($adddate) ?></td>
		 </tr>
		 <tr>
		    <td style='width:40%'>Start Date</td><td>:&nbsp;&nbsp;<?php echo($startdate) ?></td>
		 </tr>
		 <tr>
		    <td style='width:40%'>End Date</td><td>:&nbsp;&nbsp;<?php echo($enddate) ?></td>
		 </tr>
		 <tr>
		    <td style='width:40%'>Expected Price</td><td>:&nbsp;&nbsp;<?php echo($expprice) ?></td>
		 </tr>
	     
		 <tr>
		   <td colspan="2"> 
			   <input type="submit" class="btn btn-success" name="btnauction" value="Auction">
			   <input type="submit" class="btn btn-danger" name="btncancel" value="Cancel">
			</td>   
		 </tr>
		 </table>  

		</div>
	  </div>
	 </div>
	</div> 
	
	
	
   </div>	
</section>
	  
 <?php
   include("footer.php");	  
 ?>
</div>
</form>
<?php
   include("jslink.php");	  
 ?>
</body>
</html>




	  
	  