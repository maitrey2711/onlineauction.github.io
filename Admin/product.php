<HTML>
  <HEAD>
   <?php
     include("../Class/DataClass.php");
     $dc=new DataClass();
   ?>
  </HEAD>
  <BODY>
    <center>
     <?php
	   $query="select * from product";
	   $tb=$dc->getTable($query);
	   echo("<table cellpadding='7px' cellspacing='0px' border='1px' width=500px>");
	   echo("<tr>");
	   echo("<td>ID</td><td>NAME</td><td>adddate</td><td>startprice</td><td>expprice</td><td>details</td><td>enddate</td><td>image</td><td>company</td><td>regid</td>");
	   echo("<tr>");
	   while($rw=mysqli_fetch_array($tb))
	   {
		 echo("<tr>");
         echo("<td>".$rw['prdid']."</td>");
		 echo("<td>".$rw['prdname']."</td>");
		 echo("<td>".$rw['adddate']."</td>");
		 echo("<td>".$rw['startdate']."</td>");
		 echo("<td>".$rw['expprice']."</td>");
		 echo("<td>".$rw['details']."</td>");
		 echo("<td>".$rw['enddate']."</td>");
		 echo("<td>".$rw['image']."</td>");
         echo("<td>".$rw['company']."</td>");
         echo("<td>".$rw['regid']."</td>");
         echo("</tr>");
	   }
	   echo("</table>");
	 ?>
	 </center>
  </BODY>
</HTML>