<html>
 <head>
 <?php
   session_start();
   include("csslink.php");
   include("../class/DataClass.php");
 ?>
 
<?php
    $docid="";
    $docname="";
	$doctype="";
	$filename="";
	$msg="";
    $dc=new DataClass();
  ?>
  
  <?php
    
    if(isset($_POST['btndownload']))
	{
	  $docid=$_POST['btndownload'];	
	  $query="select image from document where docid='$docid'";
	  $filename=$dc->getData($query);
	  $filepath="../customer/documents/".$filename;
	  if(file_exists($filepath))
	  {
	   header('Content-Description: File Transfer');
	   header('Content-Type:application/octet-stream');
	   header('Content-Disposition: attachment;filename='.basename($filepath));
	   header('Expires:0');
	   header('Cache-Control: must-revalidate');
	   header('Pragma:public');
	   header('Content-Length:'.filesize($filepath));
	   if(readfile($filepath))
	   {
	     $msg="File download Successfully..."; 
	   }
	   else
	   {
	     $msg="Error in downloading..."; 
	   }
	   
	 }
	  
	}
?>
 
 </head>
 <body>
<div id="wrapper">
 <form name="frm" action="#" method="post">
 <?php
   include("header.php");
 ?>
 
 
<section id="content">
	<div class="container"> 
	
	 <div class="row">
	    <div class="col-md-2"></div>
	    <div class="col-md-8"><h3>File Download</h3></div>
 	 </div>
	
  	  <div class="row">
	    <div class="col-md-2"></div>
	    <div class="col-md-8">
		
		 <?php
 	       echo("<table class='table table-bordered'>");
			 echo("<tr class='tbhead'>");
			   echo("<th style='text-align:center'>ID</th><th>File Title</th><th>File Type</th><th>Download</th>");
			 echo("<tr>");
		  $query="select docid,docname,doctype from document";
		  $tb=$dc->getTable($query);   				  
		  while($rw=mysqli_fetch_array($tb))
		   {
			  echo("<tr>");
				  echo("<td style='width:10%;text-align:center'>".$rw['docid']."</td>");
				  echo("<td style='width:60%'>".$rw['docname']."</td>");
				  echo("<td style='width:20%'>".$rw['doctype']."</td>");
				  echo("<td style='width:10%'><button class='btn btn-primary' style='padding:0px 10px 0px 10px'  type='submit' name='btndownload' value=".$rw['docid'].">Download</button></td>");
			  echo("</tr>");
		   }
		  
		   echo("</table>");
		 ?>
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




	  
	  