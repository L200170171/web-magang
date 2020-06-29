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
            <a class="btn btn-success" data-toggle="modal" data-target="#myModal" style="color: white;"><span class="fa fa-plus"></span> Add Kelas</a>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped" style="font-size:13px;">
              <thead>
                <tr>
                    <th>#</th>  
                    <th>Nama</th>
                    <th>Jumlah Siswa</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no=0;
                    foreach ($tampil as $i) :
                      $no++;
                      $id = $i['kelas_id'];
                      $nama = $i['kelas_nama'];
                      $jumlah = $i['kelas_jumlah_siswa'];
                ?>
                <tr>
                  <td><?php echo $no;?></td>
        		      <td><?php echo $nama;?></td>
                  <td><?php echo $jumlah;?></td>
                  <td style="text-align:center;">
                        <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $id;?>"><span class="fa fa-pencil"></span></a>
                        <a class="btn" href="<?php echo site_url();?>admin/a_kelas/hapus/<?php echo $id ?>"><span class="fa fa-trash" onClick="return doconfirm();"></span></a>
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
  <!-- The Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data Kelas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <form class="form-horizontal" action="<?php echo site_url('admin/a_kelas/insert');?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group row">
                  <label for="inputUserName" class="col-sm-4 control-label">ID kelas</label>
                  <div class="col-sm-7">
                    <input type="text" name="ID" class="form-control" id="inputUserName" placeholder="Masukan ID" required>
                  </div>
              </div>
          
              <div class="form-group row">
                  <label for="inputUserName" class="col-sm-4 control-label">Nama kelas</label>
                  <div class="col-sm-7">
                      <input type="text" name="Nama" class="form-control" id="inputUserName" placeholder="Nama Kelas" required>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="inputUserName" class="col-sm-4 control-label">Jumlah siswa</label>
                  <div class="col-sm-7">
                      <input type="number" name="jumlah" class="form-control" id="inputUserName" placeholder="Jumlah Siswa" required>
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
</section>
<tbody>
<?php
  $no=0;
    foreach ($tampil as $i) :
      $no++;
      $id = $i['kelas_id'];
      $nama = $i['kelas_nama'];
      $jumlah = $i['kelas_jumlah_siswa'];
?>
  <div class="modal fade" id="ModalEdit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data Kelas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <form class="form-horizontal" action="<?php echo site_url('admin/a_kelas/update/').$id;?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
            <input type="hidden" name="ID" value="<?php echo $id?>">
              <div class="form-group row">
                  <label for="inputUserName" class="col-sm-4 control-label">Nama kelas</label>
                  <div class="col-sm-7">
                      <input type="text" name="Nama" class="form-control" id="inputUserName" placeholder="Nama Kelas" value="<?php echo $nama ?>" required>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="inputUserName" class="col-sm-4 control-label">Jumlah siswa</label>
                  <div class="col-sm-7">
                      <input type="number" name="jumlah" class="form-control" id="inputUserName" placeholder="Jumlah Siswa" value="<?php echo $jumlah ?>" required>
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

<?php endforeach;?>

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