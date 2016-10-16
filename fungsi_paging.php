<?php
   function pagging($batas,$target,$halaman,$sql,$db){
      $paging=$db->query($sql);
      $jumlah_data=$paging->rowCount();
      $jumlah_halaman=ceil($jumlah_data/$batas);

      // Navigasi kesebelumnya
      if($halaman > 1){
         $link = $halaman - 1;
         $prev = "<li><a href='".$target."&page=".$link."' ><i class='fa fa-chevron-left'></i></a></li>";
      }else{
         $prev = "<li class='disabled'><a><i class='fa fa-chevron-left'></i></a></li>";
      }

      //Navigasi Nomor
      $no_hal_tampil = 5; // lebih besar dari 3
      $a="<li><a>...</a></li>";
      $b="<li class='disabled'><a>".$halaman."-".$jumlah_halaman."</a></li>";
      if ($jumlah_halaman <= $no_hal_tampil) {  
         $c = $b;
         $no_hal_awal = 1;
         $no_hal_akhir = $jumlah_halaman;
      } else {
         $c=$a.$b;
         $val = $no_hal_tampil - 2; //3
         $mod = $halaman % $val; //
         $kelipatan = ceil($halaman/$val);
         $kelipatan2 = floor($halaman/$val);
             
         if($halaman < $no_hal_tampil) {
            $no_hal_awal = 1;
            $no_hal_akhir = $no_hal_tampil;
         } elseif ($mod == 2) {
            $no_hal_awal = $halaman - 1;
            $no_hal_akhir = $kelipatan * $val + 2;
         } else {
            $no_hal_awal = ($kelipatan2 - 1) * $val + 1;
            $no_hal_akhir = $kelipatan2 * $val + 2;
         }
             
         if($jumlah_halaman <= $no_hal_akhir) {
            $no_hal_akhir = $jumlah_halaman;
         }
      }


      $nmr = null;     
      for($i = $no_hal_awal; $i <= $no_hal_akhir; $i++) {
         if ($i == $halaman){
            $nmr .="<li class='active'><a href='#'>".$i."</a></li>";
         }else {
            $nmr .="<li><a href='".$target."&page=".$i."'>".$i."</a></li>";
         }
      }
      if ($halaman < $jumlah_halaman){
         $link = $halaman  + 1;
         $next = "<li><a href='".$target."&page=".$link."' ><i class='fa fa-chevron-right'></i></a></li>";
      }else{
         $next = "<li class='disabled'><a><i class='fa fa-chevron-right'></a></i></li>";
      }

      if ($jumlah_data == 0){
         $c= "<li class='disabled'><a>0-0</a></li>";
      }else{
         $c=$c;
      }
?>
      <div align="center">
         <nav>
            <ul class="pagination">
               <?php echo $prev.$nmr.$c.$next ;  ?>
            </ul>
         </nav>
      </div>         
      
<?php } ?>