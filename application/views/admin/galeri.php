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
            <a class="btn btn-success" data-toggle="modal" data-target="#myModal" style="color: white;"><span class="fa fa-plus"></span>Tambah Foto</a>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped" style="font-size:13px;">
              <thead>
                <tr>
                    <th>#</th>  
                    <th>Photo</th>
                    <th>rincian</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no=0;
                  foreach ($tampil as $i) :
                    $no++;
                    $id = $i['galeri_id'];
                    $judul = $i['galeri_judul'];
                    $tgl = $i['galeri_tanggal'];
                    $gambar = $i['galeri_gambar'];
                    $author = $i['galeri_author'];
                ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td style="text-align:center;"><img src="<?= base_url('asset/foto/galeri/'),$gambar?>" width="260" height="200">
                  </td>
                  <td>
                    <b>Judul&ensp;&ensp;&nbsp; : </b> <?= $judul ?></br>
                    <b>Tanggal&nbsp; : </b><?= $tgl;?></br>
                    <b>Author&ensp;&nbsp; : </b><?= $author;?>
                  </td>
                  <td style="text-align:center;">
                        <a class="btn" data-toggle="modal" data-target="#edit<?php echo $id;?>"><span class="fa fa-pencil"></span></a>
                        <a class="btn" href="<?php echo site_url();?>admin/a_galeri/hapus/<?php echo $id?>" onClick="return doconfirm();"><span class="fa fa-trash"></span></a>
                  </td>
                </tr>
                <?php endforeach ?>
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
  <!-- / .container-fluid -->

  <!-- Modal Tambah -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data Foto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <form class="form-horizontal" action="<?php echo site_url()?>admin/a_galeri/insert" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
                  <div class="col-sm-7">
                    <input type="text" name="judul" class="form-control" id="inputUserName" placeholder='Masukan judul' required>
                  </div>
              </div>

              <div class="form-group row justify-content-md-center">
                <label for="inputUserName" class="col-sm-4 control-label">Gambar</label>
                <div class="col-sm-7">
                  <input type="file" name="foto" class="form-control" id="inputUserName" required>
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

  <!-- Modal edit -->
  <?php 
    foreach ($tampil as $i) :
      $no++;
      $id = $i['galeri_id'];
      $judul = $i['galeri_judul'];
      $gambar = $i['galeri_gambar'];
  ?>
  <div class="modal fade" id="edit<?=$id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data Foto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <form class="form-horizontal" action="<?php echo site_url()?>admin/a_galeri/update/<?= $id ?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="fotoa" value="<?= $gambar ?>">
            <div class="modal-body">
              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
                  <div class="col-sm-7">
                    <input type="text" name="judul" class="form-control" id="inputUserName" placeholder='Masukan judul' required value='<?= $judul ?>'>
                  </div>
              </div>

              <div class="form-group row justify-content-md-center">
                <label for="inputUserName" class="col-sm-4 control-label">Gambar</label>
                <div class="col-sm-7">
                  <input type="file" name="foto" class="form-control" id="inputUserName">
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
<?php endforeach ?>
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