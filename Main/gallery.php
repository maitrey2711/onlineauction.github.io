<HMTL>
<HEAD>
<?php
	  session_start();
	  include("../class/DataClass.php");
	  include("csslink.php");
	?>
	
<style type="text/css" >
   .img1
   {
     width:200px;
	 height:200px;
	 box-shadow:5px 5px 10px gray;
	 border:3px solid orange;
	 padding:5px;
	 border-radius:10%;
   }
   .img1:hover
   {
     box-shadow:-5px -5px 10px gray;
	 border:3px solid green;
   }
   
 </style>
</HEAD>
<BODY>
 <form name="frm" action="#" method="post">
<?php
   include("header.php");
 
  ?>

<section id="about" class="section" style="padding:10px 0 80px">

  <div class="container">
   <div class="row" style="margin-top:20px">
    <div class="col-md-12"><h3>Image Gallery </h3> </div>
   </div>
   <div class="row" style="margin-top:20px">
    <div class="col-md-3">
	  <img class="img1" src="img/img1.jpg"> 
	</div>
	<div class="col-md-3">
	  <img class="img1" src="img/img2.jpg"> 
	</div>
	<div class="col-md-3">
	  <img class="img1" src="img/img3.jpg"> 
	</div>
	<div class="col-md-3">
	  <img class="img1" src="img/img4.jpg"> 
	</div>
  </div> 
  <div class="row" style="margin-top:20px">
    <div class="col-md-3">
	  <img class="img1" src="img/img5.jpg"> 
	</div>
	<div class="col-md-3">
	  <img class="img1" src="img/img6.jpg"> 
	</div>
	<div class="col-md-3">
	  <img class="img1" src="img/img7.jpg"> 
	</div>
	<div class="col-md-3">
	  <img class="img1" src="img/img8.jpg"> 
	</div>
  </div> 
</div> 
	  
	  
	    </div>
	</div>
</div>
</section>        		
 
 <?php
 include("footer.php");
?>
 </form>

<?php
 include("jslink.php");
?>
</BODY>
</HMTL>
