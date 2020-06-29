<?php if($this->session->flashdata('pesan')=='gagal'):?>
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?php echo 'Data gagal diupload ',$this->session->flashdata('pass'); ?>
  </div>
<?php elseif($this->session->flashdata('pesan')=='berhasil'):?>
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?php echo 'Data berhasil diupload'; ?>
  </div>
<?php elseif($this->session->flashdata('pesan')=='hapus'):?>
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?php echo 'Data berhasil dihapus'; ?>
  </div>
<?php elseif($this->session->flashdata('pesan')=='update'):?>
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?php echo 'Data berhasil diupdate'; ?>
  </div>
<?php endif; ?>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a class="btn btn-success" data-toggle="modal" data-target="#myModal" style="color: white;"><span class="fa fa-plus"></span> Add Agenda</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped" style="font-size:13px;">
              <thead>
                <tr>
                    <th>#</th>  
                    <th style="width:70px;">Tanggal Input</th>
                    <th>Agenda</th>
                    <th>Deskripsi</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                    <th>Tempat</th>
                    <th>Waktu</th> 
                    <th>Author</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no=0;
                    foreach ($tampil as $i) :
                      $no++;
                      $id=$i['agenda_id'];
                      $nama=$i['agenda_nama'];
                      $deskripsi=$i['agenda_deskripsi'];
                      $mulai=$i['agenda_mulai'];
                      $selesai=$i['agenda_selesai'];
                      $tempat=$i['agenda_tempat'];
                      $waktu=$i['agenda_waktu'];
                      $keterangan=$i['agenda_keterangan'];
                      $author=$i['agenda_author'];
                      $tanggal=$i['agenda_tanggal'];      
                ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $tanggal;?></td>
                  <td><?php echo $nama;?></td>
                  <td><?php echo $deskripsi;?></td>
                  <td><?php echo $keterangan;?></td>
                  <td><?php echo $mulai.' s/d '.$selesai;?></td>
                  <td><?php echo $tempat;?></td>
                  <td><?php echo $waktu;?></td>
                  <td><?php echo $author;?></td>
                  <td style="text-align:center;">
                        <a class="btn" data-toggle="modal" data-target="#edit<?php echo $id;?>"><span class="fa fa-pencil"></span></a>
                        <a class="btn" href="<?php echo site_url();?>admin/a_agenda/hapus/<?php echo $id?>" onClick="return doconfirm();"><span class="fa fa-trash"></span></a>
                  </td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->


  <!--- Modal Tambah ---->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data Agenda</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <form class="form-horizontal" action="<?php echo site_url()?>admin/a_agenda/insert" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">Agenda</label>
                  <div class="col-sm-7">
                    <input type="text" name="nama" class="form-control" id="inputUserName" placeholder='Masukan judul Agenda' required>
                  </div>
              </div>

              <div class="form-group row justify-content-md-center">
                <label for="inputUserName" class="col-sm-4 control-label">Deskripsi</label>
                <div class="col-sm-7">
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi" rows="2" placeholder='Masukan Deskripsi Agenda' required></textarea>
                </div>
              </div>  

              <div class="form-group row justify-content-md-center">
                <label for="inputUserName" class="col-sm-4 control-label">Keterangan</label>
                <div class="col-sm-7">
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="keterangan" rows="2" placeholder='Masukan Keterangan Agenda' required></textarea>
                </div>
              </div>  
          
              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">Tanggal mulai</label>
                  <div class="col-sm-7">
                      <input type="date" name="mulai" class="form-control" id="inputUserName" required>
                  </div>
              </div>

              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">Tanggal selesai</label>
                  <div class="col-sm-7">
                      <input type="date" name="selesai" class="form-control" id="inputUserName" required>
                  </div>
              </div>
              
              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">Tempat</label>
                  <div class="col-sm-7">
                      <input type="text" name="tempat" class="form-control" id="inputUserName" placeholder='Masukan Tempat Agenda' required>
                  </div>
              </div>

              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">Waktu</label>
                  <div class="col-sm-7">
                      <input type="text" name="waktu" class="form-control" id="inputUserName" placeholder="11.00-12.00" required>
                  </div>
              </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
            </div>
          </form>
      </div>
    </div>
  </div>

  <!--- Modal Edit ---->

  <?php
    foreach ($tampil as $i) :
      $no++;
      $id=$i['agenda_id'];
      $nama=$i['agenda_nama'];
      $deskripsi=$i['agenda_deskripsi'];
      $mulai=$i['agenda_mulai'];
      $selesai=$i['agenda_selesai'];
      $tempat=$i['agenda_tempat'];
      $waktu=$i['agenda_waktu'];
      $keterangan=$i['agenda_keterangan'];
      $author=$i['agenda_author'];
      $tanggal=$i['agenda_tanggal'];      
  ?>
  
  <div class="modal fade" id="edit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data Agenda</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <form class="form-horizontal" action="<?php echo site_url();?>admin/a_agenda/update/<?php echo $id?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="ID" value="<?= $id; ?>">
            <div class="modal-body">
              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">Agenda</label>
                  <div class="col-sm-7">
                    <input type="text" name="nama" class="form-control" id="inputUserName" placeholder='Masukan Nama Agenda' value="<?= $nama; ?>" required>
                  </div>
              </div>
  
              <div class="form-group row justify-content-md-center">
                <label for="inputUserName" class="col-sm-4 control-label">Deskripsi</label>
                <div class="col-sm-7">
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi" rows="2" required><?= $deskripsi; ?></textarea>
                </div>
              </div>  
              
              <div class="form-group row justify-content-md-center">
                <label for="inputUserName" class="col-sm-4 control-label">Keterangan</label>
                <div class="col-sm-7">
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="keterangan" rows="2" required><?= $keterangan; ?></textarea>
                </div>
              </div>
          
              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">Tanggal mulai</label>
                  <div class="col-sm-7">
                      <input type="date" name="mulai" class="form-control" id="inputUserName" value="<?= $mulai; ?>" required>
                  </div>
              </div>

              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">Tanggal selesai</label>
                  <div class="col-sm-7">
                      <input type="date" name="selesai" class="form-control" id="inputUserName" value="<?= $selesai; ?>" required>
                  </div>
              </div>
              
              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">Tempat</label>
                  <div class="col-sm-7">
                      <input type="text" name="tempat" class="form-control" id="inputUserName" value="<?= $tempat; ?>" required>
                  </div>
              </div>

              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">Waktu</label>
                  <div class="col-sm-7">
                      <input type="text" name="waktu" class="form-control" id="inputUserName" placeholder="11.00-12.00" value="<?= $waktu; ?>" required>
                  </div>
              </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
            </div>
          </form>
      </div>
    </div>
  </div>
    <?php endforeach; ?>
</section>

<script>
  function doconfirm()
  {
      job=confirm("Apakah anda yakin akan menghapus data ini?");
      if(job!=true)
      {
          return false;
      }
  }
</script>