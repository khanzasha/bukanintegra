<div class="row">

    <div class="pt-5 pb-2 mb-3 border-bottom col-md-10">
    	<div class="row">
    		<div class="col-8">
	        	<h1 class="h2">Daftar Mahasiswa</h1>
	        </div>
    		<div class="col-4">
    			<div class="float-right">
		            <button class="btn btn-sm btn-outline-secondary mr-1" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus"></i>
		            	Tambah Mahasiswa
		            </button>
		            <button class="btn btn-sm btn-outline-secondary ml-1" disabled>
		            	Export
		            </button>
		        </div>
	        </div>  

			<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog">
	            <div class="modal-dialog" role="document">
		            <div class="modal-content">
		                <form action="<?php echo base_url('home/mhs_tambah'); ?>" method="post">
		                  	<div class="modal-header">
			                    <h5 class="modal-title">Tambah Mahasiswa</h5>
			                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                	    <span aria-hidden="true">&times;</span>
			                    </button>
			                </div>

			                <div class="modal-body">
			                    <div class="form-group">
			                      	<label for="controlNRP">NRP</label>
			                      	<input type="text" class="form-control" id="inputNrp" value="" name="nrp">
			                    </div>
			                    <div class="form-group">
			                      	<label for="controlNama">Nama</label>
			                     	<input type="text" class="form-control" id="inputNama" value="" name="nama">
			                    </div>
			                    <div class="form-group">
			                      	<label for="controlAsal">Kota Asal</label>
			                      	<input type="text" class="form-control" id="inputAsal" value="" name="asal">
			                    </div>
			                    <div class="form-group">
			                      	<label for="controlTanggalLahir">Tanggal Lahir</label>
			                      	<input type="text" class="form-control" id="inputTanggalLahir" value="" name="tanggal_lahir">
			                    </div>
			                    <div class="form-group">
			                      	<label for="controlTahunMasuk">Tahun Masuk</label>
			                      	<input type="text" class="form-control" id="inputTahunMasuk" value="" name="tahun_masuk">
			                    </div>
			                </div>
				            <div class="modal-footer">
			                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			                    <button type="submit" class="btn btn-primary">Submit</button>
		                  	</div>
		                </form>
		            </div>
	            </div>
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
	                 	<th class="align-middle">NRP</th>
	                  	<th class="align-middle">Nama</th>
	                  	<th class="align-middle">Kota Asal</th>
	                  	<th class="align-middle">Tanggal Lahir</th>
	                  	<th class="align-middle">Tahun Masuk</th>
	                  	<th class="align-middle">Umur</th>
	                  	<th class="align-middle"></th>
	                </tr>
              	</thead>
              	<tbody>              		
              		<?php 
		                $counter = 0;
		                foreach($new as $mhs => $isi)
		                {
	                    	$counter++;
	                ?>	            
	                  	<tr>
		                    <!--
		                    <td class="align-middle text-center"><?php echo $counter; ?></td>
		                	-->	                	
		                    <td class="align-middle text-center"><?php echo ($mhs+1); ?></td>
		                    <td class="align-middle text-center"><?php echo $isi['nrp']; ?></td>
		                    <td class="align-middle text-center"><?php echo $isi['nama']; ?></td>
		                    <td class="align-middle text-center"><?php echo $isi['asal']; ?></td>
		                    <td class="align-middle text-center"><?php echo $isi['tanggal_lahir']; ?></td>
		                    <td class="align-middle text-center"><?php echo $isi['tahun_masuk']; ?></td>
		                    <td class="align-middle text-center">
		                    	<?php 
		                    		/*
		                    		# object oriented
									$from = new DateTime($isi['tanggal_lahir']);
									$to   = new DateTime('today');
									echo $from->diff($to)->y;
									*/

									# procedural
									echo date_diff(date_create($isi['tanggal_lahir']), date_create('today'))->y;
		                    	?>		
		                    </td>
		                    <td class="align-middle text-center">
		                    	<a href="<?php echo base_url('home/ambil_matkul/').$isi['nrp']; ?>" class="btn btn-primary">Ambil Matkul</a>
		                     	<button class="btn btn-danger btn-sm mx-1" title="Hapus" data-toggle="modal" data-target="#modalHapus" 
		                     	onclick="hapus('<?php echo $isi['nrp']; ?>')">
		                     		<i class="fa fa-times"></i>
		                     		<i class="fas fa-trash"></i>Hapus
		                     	</button>
		                     	
		                    </td>
	                  </tr>
	                <?php }?>
              	</tbody>
              	</table>
			</div>

			<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog">
	            <div class="modal-dialog" role="document">
		            <div class="modal-content">
		                <form action="<?php echo base_url('home/mhs_hapus'); ?>" method="post">
		                  	<div class="modal-header">
			                    <h5 class="modal-title">Konfirmasi Hapus</h5>
			                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                	    <span aria-hidden="true">&times;</span>
			                    </button>
			                </div>
			                <div class="modal-body">
			                	<input type="hidden" name="nrp" id="nrp-del" value="0">
			                    <p>Apakah anda ingin menghapus data mahasiswa ini?</p>
			                </div>
				            <div class="modal-footer">
			                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			                    <button type="submit" class="btn btn-primary">Hapus</button>
		                  	</div>
		                </form>
		            </div>
	            </div>
          	</div>

		</div>
	</div>	
</div>

		<script type="text/javascript">
            function hapus(nrp)
            {
            	document.getElementById('nrp-del').value = nrp;
            }
        </script>
