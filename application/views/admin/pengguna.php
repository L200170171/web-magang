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
            <a class="btn btn-success" data-toggle="modal" data-target="#myModal" style="color: white;"><span class="fa fa-plus"></span> Add Pengguna</a>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped" style="font-size:13px;">
              <thead>
                <tr>
                    <th>#</th>  
                    <th style="width:70px;">Photo</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Password</th> 
                    <th>Nomer HP</th> 
                    <th>Level</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no=0;
                    foreach ($tampil as $i) :
                      $no++;
                      $id = $i['pengguna_id'];
                      $nama = $i['pengguna_nama'];
                      $un = $i['pengguna_username'];
                      $pw = $i['pengguna_password'];
                      $hp=$i['pengguna_nohp'];
                      $level=$i['pengguna_level'];
                      $poto = $i['pengguna_photo'];
                ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <?php if(empty($poto)):?>
                    <td style="text-align:center;"><img src="<?php echo base_url()?>/asset/foto/pengguna/default.png" class="rounded-circle" width="50px" higth="50px"></td>
                  <?php else:?>
                    <td style="text-align:center;"><img src="<?php echo base_url()?>/asset/foto/pengguna/<?php echo $poto?>" class="rounded-circle" width="50px" higth="50px"></td>
                  <?php endif;?>
                  <td><?php echo $nama;?></td>
        		      <td><?php echo $un;?></td>
                  <td><?php echo md5($pw);?></td>
                  <td><?php echo $hp;?></td>
                  <td><?php echo $level;?></td>
                  <td style="text-align:center;">
                        <a class="btn" data-toggle="modal" data-target="#myModal<?php echo $id?>"><span class="fa fa-pencil"></span></a>
                        <a class="btn" href="<?php echo site_url();?>admin/a_pengguna/hapusdata/<?php echo $id?>" onClick="return doconfirm();"><span class="fa fa-trash"></span></a>
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
          <h5 class="modal-title" id="exampleModalLabel">Data Pengguna</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo site_url('admin/a_pengguna/insert');?>">
            <div class="modal-body">
              <input type="hidden" name="ID" >
              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                  <div class="col-sm-7">
                    <input type="text" name="Nama" class="form-control" id="inputUserName" placeholder="Nama">
                  </div>
                  <?= $this->session->flashdata('nama'); ?>
              </div>
              
              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">Username</label>
                  <div class="col-sm-7">
                      <input type="text" name="UN" class="form-control" id="inputUserName" placeholder="Username" >
                  </div>
                  <?= $this->session->flashdata('un');?>
              </div>

              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">Password</label>
                  <div class="col-sm-7">
                      <input type="password" name="PW" class="form-control" id="inputUserName" placeholder="Password">
                  </div>
                  <?= $this->session->flashdata('pw');?>
              </div>

              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">Re-Password</label>
                  <div class="col-sm-7">
                      <input type="password" name="UPW" class="form-control" id="inputUserName" placeholder="Ulangi Password">
                  </div>
                  <?= $this->session->flashdata('upw');?>
              </div>

              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">No HP</label>
                  <div class="col-sm-7">
                      <input type="text" name="HP" class="form-control" id="inputUserName" placeholder="No HP">
                  </div>
                  <?= $this->session->flashdata('hp');?>
              </div>

              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">Level</label>
                  <div class="col-sm-7">
                        <select class="form-control" name="level">
                            <option value="Admin" selected>Administrator</option>
                            <option value="User">User</option>
                        </select>
                  </div>
              </div>

              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
                  <div class="col-sm-7">
                      <input type="file" name="foto"/>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal" id='add'>Close</button>
                <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
            </div>
            </form>
        </div>
    </div>
        </div>
</section>

<!--Modal edit--->
<!-- The Modal -->
<?php
  $no=0;
    foreach ($tampil as $i) :
      $no++;
      $id = $i['pengguna_id'];
      $nama = $i['pengguna_nama'];
      $un = $i['pengguna_username'];
      $pw = $i['pengguna_password'];
      $hp=$i['pengguna_nohp'];
      $level=$i['pengguna_level'];
      $poto = $i['pengguna_photo'];
?>

<div class="modal fade" id="myModal<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data Pengguna</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo site_url()?>admin/a_pengguna/update/<?php echo $id?>">
            <div class="modal-body">
              <input type="hidden" name="ID" value="<?php echo $id?>">
              <input type="hidden" name="fotoa" value="<?php echo $poto?>">
              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                  <div class="col-sm-7">
                    <input type="text" name="Nama" class="form-control" id="inputUserName" placeholder="Nama" value="<?php echo $nama?>" required>
                  </div>
                  <?= $this->session->flashdata('nama');?>
              </div>
          
              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">Username</label>
                  <div class="col-sm-7">
                      <input type="text" name="UN" class="form-control" id="inputUserName" placeholder="Username" value="<?php echo $un?>" required>
                  </div>
                  <?= $this->session->flashdata('un');?>
              </div>

              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">Password Lama</label>
                  <div class="col-sm-7">
                      <input type="password" name="UPW" class="form-control" id="inputUserName" placeholder="Masukan Password lama" required>
                  </div>
                  <?= $this->session->flashdata('upw');?>
              </div>

              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">Password Baru</label>
                  <div class="col-sm-7">
                      <input type="password" name="PWB" class="form-control" id="inputUserName" placeholder="Masukan Password Baru">
                  </div>
                  <?= $this->session->flashdata('pwb');?>
              </div>

              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">No HP</label>
                  <div class="col-sm-7">
                      <input type="text" name="HP" class="form-control" id="inputUserName" placeholder="No HP" value="<?php echo $hp?>" required>
                  </div>
                  <?= $this->session->flashdata('hp');?>
              </div>

              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">Level</label>
                  <div class="col-sm-7">
                        <select class="form-control" name="level" id="inputUserName">
                            <option value="Admin" <?php if($level=="Admin"){echo "Selected";}?>>Admin</option>
                            <option value="User" <?php if($level == "User"){echo "Selected";}?>>User</option>
                        </select>
                  </div>
              </div>

              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
                  <div class="col-sm-7">
                      <img src="<?php echo base_url()?>/asset/foto/pengguna/<?php echo $poto?>" width="100px" heigth="100px">
                      <input type="file" name="fotoe"/>
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