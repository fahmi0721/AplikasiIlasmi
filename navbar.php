<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-default  navbar-fixed-top">
				  <div class="container">
				  	  	<div class="navbar-header">
					      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
					      <a class="navbar-brand" href="index.php">Kehamilan Islami</a>
					    </div>

					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					      	<ul class="nav navbar-nav">
					        	<li <?php if(!isset($_GET['module']) || $_GET['module'] =="home"){ echo "class='active'"; } ?>><a href="index.php"><i class="fa fa-home"></i> Beranda</a></li>
					        	<li <?php if(@$_GET['module'] =="tentang.kami"){ echo "class='active'"; } ?>><a href="index.php?module=tentang.kami"><i class="fa fa-info-circle"></i> Tentang Kami</a></li>
					        	<li <?php if(@$_GET['module'] =="berita"){ echo "class='active'"; } ?>><a href="index.php?module=berita"><i class="fa fa-newspaper-o"></i> Berita Terbaru</a></li>
					        	<li <?php if(@$_GET['module'] =="registrasi"){ echo "class='active'"; } ?>><a href="index.php?module=registrasi"><i class="fa fa-registered"></i> Registrasi</a></li>
					      	</ul>
					      	<form class="navbar-form navbar-right" role="search">
							  	<div class="input-group">
						      		<input type="text" class="form-control"  placeholder="Cari disini...">
						      		<div class="input-group-addon"><i class="fa fa-search"></i></div>

						    	</div>
							</form>
					    </div>
					    
				  </div>
				</nav>
			</div>
		</div>