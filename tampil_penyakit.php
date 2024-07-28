<div class="table-responsive">
  <div class="card">
    <div class="card-header text-white border-dark" style="background-color: #14b8b8"><strong>DATA PENYAKIT</strong></div>
        <div class="card-body">
            <a class="btn mb-2" style="background-color: #14b8b8" href="?page=penyakit&action=tambah">Tambah</a>
                <table class="table-responsive table-bordered" id="myTable">
    <thead>
        <tr>
            <th width="80px">No</th>
            <th width="100px" >Kode Penyakit</th>
            <th width="200px" >Nama Penyakit</th>
            <th width="300px" >Keterangan</th>
            <th width="200px" >Solusi</th>
            <th width="100px"></th>
        </tr>
    </thead>
    
    <tbody>
			<!-- letakkan proses menampilkan disini -->
            <?php
                $no=1;
                $sql = "SELECT*FROM penyakit";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['kdpenyakit']; ?></td>
                    <td><?php echo $row['nmpenyakit']; ?></td>
                    <td><?php echo $row['keterangan']; ?></td>
                    <td><?php echo $row['solusi']; ?></td>
                    <td align="center">
                        <a class="btn btn-warning" href="?page=penyakit&action=update&id=<?php echo $row['idpenyakit']; ?>">
                        <i class="fas fa-edit"></i>
                        </a>
                        <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=penyakit&action=hapus&id=<?php echo $row['idpenyakit']; ?>">
                        <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php
                }
                $conn->close();
            ?>
                
    </tbody>

            </table>
        </div>
    </div> 
</div>