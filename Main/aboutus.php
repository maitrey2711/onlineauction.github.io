<HMTL>
<HEAD>
<?php
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
    <div class="span12"><h3>About Us </h3> </div>
   </div>
   
	<div class="row">
				<div class="col-md-4">
					<img src="img/img1.jpg" alt="showcase image" width="100%">
				</div>
				<div class="col-md-8">
					<div class="about-text">
						<h2 style="margin-top:0px"><span class="coloured">About</span> Company</h2>
						<p style="text-align:justify">Sed ut perspiciaatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Vivamus suscipit tortor eget felis porttitor volutpat. Cras ultricies ligula sed magna dictum porta. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar.
						Sed ut perspiciaatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo 						Sed ut perspiciaatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo 						Sed ut perspiciaatis unde omnis iste.</p>
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
