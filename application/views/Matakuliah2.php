<div class="row">

    <div class="pt-5 pb-2 mb-3 border-bottom col-md-10">
    	<div class="row">
    		<div class="col-8">
	        	<h1 class="h2">Daftar Matakuliah - <?php echo $nrp; ?></h1>
	        </div>
  		
    	</div>       
    </div>


	<div class="col-md-10">
		<div class="table-responsive-md">
			
			<div class="table">
				<table class="table table-bordered table-striped table-sm">
				<thead class="text-center">
	                <tr>
	                  	<th class="align-middle">No.</th>	                 	
	                 	<th class="align-middle">ID Matakuliah</th>
	                  	<th class="align-middle">Nama Matakuliah</th>
	                  	<th class="align-middle">Jumlah SKS</th>
	                  	<th class="align-middle">Kategori</th>
	                </tr>
              	</thead>
              	<tbody>              		
              		<?php 
		                $counter = 0;
		                foreach($new as $matkul => $isi)
		                {
	                    	$counter++;
	                ?>	            
	                 	<tr>          	
		                    <td class="align-middle text-center"><?php echo ($matkul+1); ?></td>
		                    <td class="align-middle text-center"><?php echo $isi['id_matkul']; ?></td>
		                    <td class="align-middle text-center"><?php echo $isi['nama_matkul']; ?></td>
		                    <td class="align-middle text-center"><?php echo $isi['sks']; ?></td>
		                    <td class="align-middle text-center"><?php echo $isi['kategori']; ?></td>
		                    <td class="align-middle text-center">
		                    	<a href="<?php echo base_url('home/do_ambil/').$isi['id_matkul'].'/'.$nrp; ?>" class="btn btn-success">Ambil</a>
		                    </td>
	                  	</tr>
	              <?php }?>
              	</tbody>
              	</table>
			</div>

		</div>
	</div>	
</div>