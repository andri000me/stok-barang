  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Stok Barang
        <small>Stok Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Stok Barang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Alert -->
        <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan') ?>"></div>

        <!-- Tombol Tambah Data -->
        <div class="btn btn-danger" data-toggle="modal" data-target="#tambahData">
            <div class="fa fa-plus"></div> Tambah Data
        </div>

        <!-- Tabel Data -->
        <div class="box box-danger" style="margin-top: 15px">
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="example1">
                        <thead>
                            <tr>
                                <th width="5px">No</th>
                                <th>Kode Barang</th>
                                <th>Sisa Stok</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach ($barang as $brg) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $brg->kode; ?></td>
                                    <td><?php echo $brg->stok; ?></td>
                                    <td>
                                        <button class="btn btn-success btn-sm">
                                            <div class="fa fa-plus-square"></div> Kelola
                                        </button>
                                        <a href="<?php echo base_url('index.php/admin/barang/delete/').$brg->id; ?>" class="btn btn-danger btn-sm tombol-yakin" data-isiData="Ingin menghapus data ini!">
                                            <div class="fa fa-trash"></div> Delete
                                        </a>
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editData<?php echo $brg->id; ?>">
                                            <div class="fa fa-edit"></div> Edit
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Modal Tambah Data -->
  <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><div class="fa fa-plus"></div> Tambah Data</h4>
        </div>
        <form action="<?php echo base_url('index.php/admin/barang/insert') ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
                <label>Kode Barang</label>
                <input type="text" class="form-control" name="kode" placeholder="Kode Barang" required>
            </div>
            <div class="form-group">
                <label>Sisa Stok</label>
                <input type="number" class="form-control" name="stok" placeholder="Sisa Stok" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-danger"><div class="fa fa-trash"></div> Reset</button>
            <button type="submit" class="btn btn-primary"><div class="fa fa-save"></div> Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Edit Data -->
  <?php foreach ($barang as $brg) { ?>
    <div class="modal fade" id="editData<?php echo $brg->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><div class="fa fa-edit"></div> Edit Data</h4>
                </div>
                <form action="<?php echo base_url('index.php/admin/barang/update') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Barang</label>
                        <input type="hidden" name="id" value="<?php echo $brg->id; ?>">
                        <input type="text" class="form-control" name="kode" placeholder="Kode Barang" value="<?php echo $brg->kode; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Sisa Stok</label>
                        <input type="number" class="form-control" name="stok" placeholder="Sisa Stok" value="<?php echo $brg->stok; ?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger"><div class="fa fa-trash"></div> Reset</button>
                    <button type="submit" class="btn btn-primary"><div class="fa fa-save"></div> update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
  <?php } ?>