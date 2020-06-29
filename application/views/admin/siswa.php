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
            <a class="btn btn-success" data-toggle="modal" data-target="#myModal" style="color: white;"><span class="fa fa-plus"></span> Add Siswa</a>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped" style="font-size:13px;">
              <thead>
                <tr>
                    <th>#</th>  
                    <th style="width:70px;">Photo</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelas</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no=0;
                    foreach ($tampil as $i) :
                      $no++;
                      $id = $i['siswa_id'];
                      $nis = $i['siswa_nis'];
                      $nama = $i['siswa_nama'];
                      $jk=$i['siswa_jenkel'];
                      $kelas = $i['kelas_nama'];
                      $poto = $i['siswa_photo'];
                ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <?php if(empty($poto)):?>
                    <td><span class="fa fa-user"></span></td>
                  <?php else:?>
                    <td><span class="fa fa-user"></span></td>
                  <?php endif;?>
                  <td><?php echo $nis;?></td>
        		  <td><?php echo $nama;?></td>
                  <td><?php echo $jk;?></td>
                  <td><?php echo $kelas;?></td>
                  <td style="text-align:center;">
                        <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $id;?>"><span class="fa fa-pencil"></span></a>
                        <a class="btn" href="<?php echo site_url();?>admin/a_siswa/hapusdata/<?php echo $id?>" onClick="return doconfirm();"><span class="fa fa-trash"></span></a>
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
          <h5 class="modal-title" id="exampleModalLabel">Data Guru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <form class="form-horizontal" action="<?php echo site_url()?>admin/a_siswa/insert" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">NIS</label>
                  <div class="col-sm-7">
                    <input type="text" name="NIS" class="form-control" id="inputUserName" placeholder="NIS" required>
                  </div>
              </div>
          
              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                  <div class="col-sm-7">
                      <input type="text" name="Nama" class="form-control" id="inputUserName" placeholder="Nama" required>
                  </div>
              </div>

              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">Jenis Kelamin</label>
                  <div class="col-sm-7">
                  <div class="radio radio-info d-inline">
                        <input type="radio" id="inlineRadio1" value="Laki-laki" name="JK" checked>
                        <label for="inlineRadio1"> Laki-Laki </label>
                    </div>
                    <div class="radio radio-info d-inline">
                        <input type="radio" id="inlineRadio1" value="Perempuan" name="JK">
                        <label for="inlineRadio2"> Perempuan </label>
                    </div>
                  </div>
              </div>

              <div class="form-group row justify-content-md-center">
                <label for="inputUserName" class="col-sm-4 control-label">Kelas</label>
                <div class="col-sm-7">
                  <select class="form-control" name="kelas">
                  <?php
                    foreach ($tampill as $i) :
                      $id= $i['kelas_id'];
                      $nama =$i['kelas_nama'];?>
                      <option value="<?=$id?>"><?= $nama;?></option>
                    <?php endforeach?>
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
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
            </div>
            </form>
        </div>
    </div>
  </div>

  <!--- Modal edit --->
  <?php
  $no=0;
    foreach ($tampil as $i) :
      $no++;
      $id = $i['siswa_id'];
      $nis = $i['siswa_nis'];
      $nama = $i['siswa_nama'];
      $jk=$i['siswa_jenkel'];
      $kelas = $i['kelas_nama'];
      $poto = $i['siswa_photo'];
  ?>
  <div class="modal fade" id="ModalEdit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data Siswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <form class="form-horizontal" action="<?php echo site_url()?>admin/a_siswa/update/<?php echo $id?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
            <input type="hidden" name="ID" value="<?= $id; ?>">
            <input type="hidden" name="fotoa" value="<?php echo $poto?>">
              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">NIS</label>
                  <div class="col-sm-7">
                    <input type="text" name="NIS" class="form-control" id="inputUserName" placeholder="NIS" value="<?= $nis?>" required>
                  </div>
              </div>
          
              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                  <div class="col-sm-7">
                      <input type="text" name="Nama" class="form-control" id="inputUserName" placeholder="Nama" value="<?= $nama?>" required>
                  </div>
              </div>

              <div class="form-group row justify-content-md-center">
                  <label for="inputUserName" class="col-sm-4 control-label">Jenis Kelamin</label>
                  <div class="col-sm-7">
                  <div class="radio radio-info d-inline">
                        <input type="radio" id="inlineRadio1" value="Laki-laki" name="JK" <?php if($jk=="Laki-laki"){echo "checked";}?>>
                        <label for="inlineRadio1"> Laki-Laki </label>
                    </div>
                    <div class="radio radio-info d-inline">
                        <input type="radio" id="inlineRadio1" value="Perempuan" name="JK" <?php if($jk=="Perempuan"){echo "checked";}?>>
                        <label for="inlineRadio2"> Perempuan </label>
                    </div>
                  </div>
              </div>

              <div class="form-group row justify-content-md-center">
                <label for="inputUserName" class="col-sm-4 control-label">Kelas</label>
                <div class="col-sm-7">
                  <select class="form-control" name="kelas">
                  <?php
                    foreach ($tampill as $i) :
                      $idk= $i['kelas_id'];
                      $nama =$i['kelas_nama'];?>
                      <option value="<?=$idk?>"<?php if($nama==$kelas){echo 'selected';}?>> <?= $nama;?> </option>
                    <?php endforeach?>
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