<?php
$image = array("slide1.png","slide2.png","slide3.png","slide4.png","slide5.png");
?>
<div class="row" style="margin-top:50px;">
	<div class="col-md-12">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  	<ol class="carousel-indicators">
		  		<?php 
		  			for($i=0; $i<count($image); $i++){
		  			if($i == 0){
		  		?>
		    		<li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" class="active"></li>
		    	<?php }else{ ?>
		    		<li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>"></li>
		    	<?php } } ?>
		  	</ol>

		  <!-- Wrapper for slides -->
		  	<div class="carousel-inner" role="listbox">
		  		<?php
		  			for ($j=0; $j <count($image) ; $j++) { 
		  				if($j == 0){
		  		?>
			    	<div class="item active">
			      		<img width="1170px" src="image/slide/<?php echo $image[$j]; ?>" alt="Slide <?php echo $j; ?>">
			    	</div>
			    <?php }else{ ?> 
			    	<div class="item">
			      		<img src="image/slide/<?php echo $image[$j]; ?>" alt="Slide <?php echo $j; ?>">
			    	</div>
			   	<?php } } ?>
		  	</div>

		  	<!-- Controls -->
		  	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		    	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    	<span class="sr-only">Previous</span>
		  	</a>
		  	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		    	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    	<span class="sr-only">Next</span>
		  	</a>
		</div>
	</div>
</div>