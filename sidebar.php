<div class="col-md-3">
	<ul class="list-group">
		<li class="list-group-item active"><b>Login Member</b></li>
		<li class="list-group-item">
			<?php if(!isset($_SESSION['username'])){ ?>
			<form action="#"  id="formLogin" method="POST">
			  	<div class="form-group">
			    	<div class="input-group">
			      		<div class="input-group-addon"><i class="fa fa-user"></i></div>
			      		<input type="text" class="form-control" name="username" id="username" placeholder="Enter Username">
			      		<input type="hidden" name="act" id="act" value="login">
			    	</div>
			  	</div>


			  	<div class="form-group">
			    	<div class="input-group">
			      		<div class="input-group-addon"><i class="fa fa-key"></i></div>
			      		<input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
			    	</div>
			  	</div>

			  	<div class="form-group">
			    	<button type="button" onclick="login();" class="btn btn-custom btn-sm"><i class="fa fa-sign-in"></i> Login</button>
			    	<button type="button" class="btn btn-default btn-sm"><i class="fa fa-times-circle"></i> Batal</button>
			  	</div>
			</form>
			<?php }else{ 
				$image = "admin/image/default/avatar.png";
				if($dt_user->foto != null){
					$image = "admin/image/foto/".$dt_user->foto;
				}
			?> 
				<img class='img-responsive' src="<?php echo $image; ?>">
				<br />
				<div class='row'>
				<div class="col-md-6">
					<a href='index.php?module=profil' class='btn btn-primary btn-sm btn-block'><i class='fa fa-user'></i> <b>Profil</b></a>
				</div>
				<div class="col-md-6">
					<a href='logout.php' class='btn btn-custom btn-sm btn-block'><i class='fa fa-sign-out'></i> <b>Keluar</b></a>
				</div>
				</div>
			<?php } ?>
		</li>
	</ul>
	<div class="list-group">
		<a class="list-group-item active"><b>Kategori Berita</b></a>
		<?php
			$sqlk = $db->query("SELECT * FROM kategori  ORDER BY id_kategori DESC");
			while($dtk = $sqlk->fetch(PDO::FETCH_LAZY)){
		?>
		<a class="list-group-item" href="index.php?module=kategori.berita&id_kategori=<?php echo $dtk->id_kategori; ?>"><?php echo $dtk->kategori; ?></a>
		<?php } ?>
	</div>
	<ul class="list-group">
		<li class="list-group-item active"><b>Jadwal</b></li>
		<li class="list-group-item">
			<?php include 'date.php'; ?>
			<br />
			<center><div style="font-size:16px;" id="clock"></div></center>
		</li>
	</ul>
</div>
