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
	<?php
	  if(isset($_POST["btnnew"]))
	  {
		$_SESSION["trans"]="new";  
	    header("location:emailform.php");
	  }
	
	  if(isset($_POST["btnupdate"]))
	  {
		$_SESSION["trans"]="update";  
		$_SESSION["id"]=$_POST["btnupdate"];
	    header("location:emailform.php");
	  }
	  if(isset($_POST["btndelete"]))
	  {
		  $emailid=$_POST["btndelete"];
		  $query="delete from email where emailid='$emailid'";
		  $result=$dc->saveRecord($query);
		  if($result)
		  {
		    $msg="Record Deleted";
		  }
		  		  
	  }
	?>
	
</HEAD>
<BODY class="fixed-nav sticky-footer bg-dark" id="page-top">
<form name="frm" action="#" method="post">
 
 <?php
 include("navbar.php");
?>

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
		<div class="col-xl-12">
		 <h3>EMAIL DETAILS
            <button type='submit' class="btn btn-primary pull-right"  name='btnnew'>NEW</button>
			</h3>
		</div>
	</div>	
		 <div class="row">
		   <div class="col-md-1"></div>
			<div class="col-md-10">
		     <?php
			   $query="select emailid,emailfrom,emailto,subject,description from email";
			   $tb=$dc->getTable($query);
			   echo("<table class='table table-bordered'>");
			   echo("<tr>");
			     echo("<th>ID</th>");
				 echo("<th>EMAILFROM</th>");
				 echo("<th>EMAILTO</th>");
				 echo("<th>SUBJECT</th>");
				 echo("<th>DESCRIPTION</th>");				 
				 echo("<th>DELETE</th>");
				 echo("<th>UPDATE</th>");
			     echo("</tr>");
			   while($rw=mysqli_fetch_array($tb))
			   {
				  echo("<tr>");
			      echo("<td>".$rw['emailid']."</td>");
				  echo("<td>".$rw['emailfrom']."</td>");
				  echo("<td>".$rw['emailto']."</td>");
				  echo("<td>".$rw['subject']."</td>");
				  echo("<td>".$rw['description']."</td>");
			      echo("<td><button type='submit' class='btn btn-danger' name='btndelete' value='".$rw['emailid']."'>DELETE</button></td>");
				   echo("<td><button type='submit' class='btn btn-success' name='btnupdate' value='".$rw['emailid']."'>UPDATE</button></td>");
				  
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
	
</form>
<?php
 include("jslink.php");
?>
</BODY>
</HTML>