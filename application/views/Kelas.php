<div class="row">

    <div class="pt-5 pb-2 mb-3 border-bottom col-md-10">
    	<div class="row">
    		<div class="col-8">
	        	<h1 class="h2">Semester Genap 2020</h1>
	        </div>
    		<div class="col-4">
    			<div class="float-right">
		            <button class="btn btn-sm btn-outline-secondary mr-1" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus"></i>
		            	Tambah Kelas
		            </button>
		            <button class="btn btn-sm btn-outline-secondary ml-1" disabled>
		            	Export
		            </button>
		        </div>
	        </div>  

			<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog">
	            <div class="modal-dialog" role="document">
		            <div class="modal-content">
		                <form action="<?php echo base_url('home/kelas_tambah'); ?>" method="post">
		                  	<div class="modal-header">
			                    <h5 class="modal-title">Tambah Kelas</h5>
			                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                	    <span aria-hidden="true">&times;</span>
			                    </button>
			                </div>

			                <div class="modal-body">
			                    <div class="form-group">
			                      	<label for="controlMatkul">Nama Matakuliah</label>
			                      	<input type="text" class="form-control" id="inputMatkul" value="" name="matakuliah">
			                    </div>
			                    <div class="form-group">
			                      	<label for="controlKelas">Kelas</label>
			                     	<input type="text" class="form-control" id="inputKelas" value="" name="kelas">
			                    </div>
			                    <div class="form-group">
			                      	<label for="controlNamaDosen">Nama Dosen</label>
			                      	<input type="text" class="form-control" id="inputNamaDosen" value="" name="nama_dosen">
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
			
			<!--
			<table class="table align-middle text-center">
				<?php 
					echo "<tr><td>No." . "</td><td>Matakuliah" . "</td><td>Kelas" . "</td><td>Nama Dosen" . "</td></tr>";
				    foreach($new as $matkul => $isi){
				        echo "<tr><td>". ($matkul+1) . "</td><td>" . $isi['matakuliah'] . "</td><td>" . $isi['kelas']. "</td><td>" . $isi['nama_dosen']."</td></tr>";
				    }
				?>    
			</table>
			-->

			<div class="table">
				<table class="table table-bordered table-striped table-sm">
				<thead class="text-center">
	                <tr>
	                  	<th class="align-middle">No.</th>	                 	
	                 	<th class="align-middle">Mata Kuliah</th>
	                  	<th class="align-middle">Kelas Paralel</th>
	                  	<th class="align-middle">Dosen</th>
	                  	<th></th>
	                </tr>
              	</thead>
              	<tbody>              		
              		<?php 
		                $counter = 0;
		                foreach($new as $kelas => $isi)
		                {
	                    	$counter++;
	                ?>	            
	                  	<tr>
		                    <!--
		                    <td class="align-middle text-center"><?php echo $counter; ?></td>
		                	-->	                	
		                    <td class="align-middle text-center"><?php echo ($kelas+1); ?></td>
		                    <td class="align-middle text-center"><?php echo $isi['matakuliah']; ?></td>
		                    <td class="align-middle text-center"><?php echo $isi['kelas']; ?></td>
		                    <td class="align-middle text-center"><?php echo $isi['nama_dosen']; ?></td>
		                    <td class="align-middle text-center">
								<button class="btn btn-info btn-sm mx-1" title="Edit" data-toggle="modal" data-target="#modalEdit" 
								onclick="edit('<?php echo $isi['id_kelas']; ?>', '<?php echo $isi['matakuliah']; ?>','<?php echo $isi['kelas']; ?>','<?php echo $isi['nama_dosen']; ?>')">
									<i class="fa fa-pencil"></i>
		                    		<i class="fas fa-edit"></i>Edit
		                      	</button>
		                     	<button class="btn btn-danger btn-sm mx-1" title="Hapus" data-toggle="modal" data-target="#modalHapus" 
		                     	onclick="hapus('<?php echo $isi['id_kelas']; ?>')">
		                     		<i class="fa fa-times"></i>
		                     		<i class="fas fa-trash"></i>Hapus
		                     	</button>

		                     	
		                    </td>
	                  </tr>
	                <?php }?>
              	</tbody>
              	</table>
			</div>

			<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog">
	            <div class="modal-dialog" role="document">
		            <div class="modal-content">
		                <form action="<?php echo base_url('home/kelas_edit'); ?>" method="post">
		                  	<div class="modal-header">
			                    <h5 class="modal-title">Edit Kelas</h5>
			                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                	    <span aria-hidden="true">&times;</span>
			                    </button>
			                </div>

			                <div class="modal-body">
			                    <input type="hidden" name="id_kelas" id="id_kelas" value="0">
			                    <div class="form-group">
			                      	<label for="controlMatkul">Nama Matakuliah</label>
			                      	<input type="text" class="form-control" id="controlMatkul" value="" name="matakuliah" readonly="">
			                    </div>
			                    <div class="form-group">
			                      	<label for="controlKelas">Kelas</label>
			                     	<input type="text" class="form-control" id="controlKelas" value="" name="kelas">
			                    </div>
			                    <div class="form-group">
			                      	<label for="controlNamaDosen">Nama Dosen</label>
			                      	<input type="text" class="form-control" id="controlNamaDosen" value="" name="nama_dosen">
			                    </div>
			                </div>
				            <div class="modal-footer">
			                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			                    <button type="submit" class="btn btn-primary">Edit</button>
		                  	</div>
		                </form>
		            </div>
	            </div>
          	</div>


			<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog">
	            <div class="modal-dialog" role="document">
		            <div class="modal-content">
		                <form action="<?php echo base_url('home/kelas_hapus'); ?>" method="post">
		                  	<div class="modal-header">
			                    <h5 class="modal-title">Konfirmasi Hapus</h5>
			                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                	    <span aria-hidden="true">&times;</span>
			                    </button>
			                </div>
			                <div class="modal-body">
			                	<input type="hidden" name="id_kelas" id="id_kelas-del" value="0">
			                    <p>Apakah anda ingin menghapus kelas ini?</p>
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
            function edit(id_kelas, matakuliah, kelas, nama_dosen)
            {
	            document.getElementById('id_kelas').value = id_kelas;
	            document.getElementById('controlMatkul').value = matakuliah;
	            document.getElementById('controlKelas').value = kelas;
	            document.getElementById('controlNamaDosen').value = nama_dosen;
            }
            function hapus(id_kelas)
            {
            	document.getElementById('id_kelas-del').value = id_kelas;
            }
        </script>





	                    <!--
	                  <input type="hidden" name="id" value="" id="id_kelas"/>

						<div class="form-group">
							<label for="controlMatkul">Matakuliah*</label>
							<input class="form-control <?php echo form_error('matakuliah') ? 'is-invalid':'' ?>"
							 type="text" name="name" placeholder="Matakuliah" value="<?php echo $kelas->matakuliah ?>" />
							<div class="invalid-feedback">
								<?php echo form_error('matakuliah') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="controlKelas">Kelas</label>
							<input class="form-control <?php echo form_error('kelas') ? 'is-invalid':'' ?>"
							 type="number" name="kelas" min="0" placeholder="Kelas" value="<?php echo $kelas->kelas ?>" />
							<div class="invalid-feedback">
								<?php echo form_error('kelas') ?>
							</div>
						</div>


						<div class="form-group">
							<label for="controlNamaDosen">Nama Dosen</label>
							<input class="form-control-file <?php echo form_error('nama_dosen') ? 'is-invalid':'' ?>"
							 type="file" name="image" />
							<input type="hidden" name="old_image" value="<?php echo $kelas->nama_dosen ?>" />
							<div class="invalid-feedback">
								<?php echo form_error('nama_dosen') ?>
							</div>
						</div>
						
						-->
<!--
<!DOCTYPE html>
<html>
<head>
	<title>Mata Kuliah</title>
</head>
<body>

<h1>Mata kuliah dan Dosen </h1>
<p>
	<?php
		foreach ($new as $matkul => $isi) {
			echo $matkul." - ".$isi['matakuliah']." - ".$isi['kelas']." - ".$isi['nama_dosen'];
			echo "<br><br>";
		}
	?>
	<?php
		foreach ($new as $matkul => $isi) {
			echo $matkul." - ".$isi['matakuliah']." - ".$isi['kelas']." - ".$isi['nama_dosen'];
			echo "<br><br>";
		}
	?>

</p>

</body>
</html>
-->
