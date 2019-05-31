          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Halte Bus Dalam Kota Surabaya</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary mx-1" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Halte</button>
                <button class="btn btn-sm btn-outline-secondary mx-1" disabled>Export</button>
              </div>
            </div>
          </div>

          <div class="table-responsive">
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
                    foreach($new as $matkul => $isi)
                    {
                        $counter++;
                  ?>              
                      <tr>
                        <!--
                        <td class="align-middle text-center"><?php echo $counter; ?></td>
                      -->                   
                        <td class="align-middle text-center"><?php echo ($matkul+1); ?></td>
                        <td class="align-middle text-center"><?php echo $isi['matakuliah']; ?></td>
                        <td class="align-middle text-center"><?php echo $isi['kelas']; ?></td>
                        <td class="align-middle text-center"><?php echo $isi['nama_dosen']; ?></td>
                        <td class="align-middle text-center">
                <button class="btn btn-info btn-sm mx-1" title="Edit" data-toggle="modal" data-target="#modalEdit">
                  <i class="fa fa-pencil"></i>
                            <i class="fas fa-edit"></i>Edit
                            </button>
                          <button class="btn btn-danger btn-sm mx-1" title="Hapus" data-toggle="modal" data-target="#myModal2">
                            <i class="fa fa-times"></i>
                            <i class="fas fa-trash"></i>Hapus
                          </button>

                          
                        </td>
                    </tr>
                  <?php }?>
                </tbody>
          </div>

          <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <h4>test</h4>
              </div>
            </div>
          </div>
          
          <!-- Modal -->
          <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                      <form method="post" action="<?php echo base_url('back/halte_baru'); ?>">
                        <div class="modal-header">
                          <h4 class="modal-title">Halte Baru</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="FormControlDay">Rute</label>
                            <select class="form-control" id="FormControlDay" value="" name="rute">
                              <option value="" selected disabled>Pilih Rute</option>
                              <?php foreach($rute as $row) { ?>
                              <option value="<?php echo $row['rute_id']; ?>"><?php echo $row['rute_nama']; ?></option>
                              <?php } ?>
                              </select>
                          </div>
                          <div class="form-group">
                            <label for="FormControlRIT">Nama Halte</label>
                            <input type="text" class="form-control" id="FormControlRIT" value="" name="halte">
                          </div>
                          <div class="form-group">
                            <label for="FormControlTime">Lokasi <span class="text-danger">*link google maps</span></label>
                            <input type="text" class="form-control" id="FormControlTime" value="" name="lokasi">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </form>
                  </div>
              </div>
          </div>

          <!-- Modal -->
          <div id="myModal2" class="modal fade" role="dialog">
              <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                      <form method="post" action="<?php echo base_url('back/halte_hapus'); ?>">
                        <div class="modal-header">
                          <h4 class="modal-title">WARNING!</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body text-center">
                          <p><b>Apakah anda yakin untuk menghapus data halte berikut?</b></p>
                          <br>
                          <p id="who2"></p>
                          <input type="hidden" name="halte_id" id="halte-id-hapus" value="0">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                      </form>
                  </div>
              </div>
          </div>

          <div class="modal fade" id="Modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form action="<?php echo base_url('back/halte_edit'); ?>" method="post">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Halte</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="halte_id" id="halte-id-edit">
                    <div class="form-group">
                      <label for="FormControlRute">Rute</label>
                      <input type="text" class="form-control text-center" id="FormControlRute" value="" name="rute_id_halte" readonly>
                    </div>
                    <div class="form-group">
                      <label for="FormControlHalte">Nama Halte</label>
                      <input type="text" class="form-control" id="FormControlHalte" value="" name="halte">
                    </div>
                    <div class="form-group">
                      <label for="FormControlLokasi">Lokasi <span class="text-danger">*link google maps</span></label>
                      <input type="text" class="form-control" id="FormControlLokasi" value="" name="lokasi">
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

          <script type="text/javascript">
            function edit(id, rute, halte, lokasi)
            {
              document.getElementById('FormControlRute').value = rute;
              document.getElementById('FormControlHalte').value = halte;
              document.getElementById('FormControlLokasi').value = lokasi;
              document.getElementById('halte-id-edit').value = id;
            }

            function hapus(id, name)
            {
                document.getElementById("who2").innerHTML = name; 
                document.getElementById("halte-id-hapus").value = id;
            }

            function update(rute)
            {
              if(rute != '')
              {
                $.ajax({
                  url: "<?php echo base_url('ajax/data_halte'); ?>",
                  type: "POST",
                  data: {'rute' : rute},
                  dataType: 'json',
                  success: function(data){
                    $('#table-halte').html(data);
                  },
                  error: function(){
                    alert('Error');
                  }
                });
              }
            }
          </script>