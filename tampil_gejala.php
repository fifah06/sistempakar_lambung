<div class="table-responsive">
  <div class="card">
    <div class="card-header text-white border-dark" style="background-color: #14b8b8"><strong>DATA GEJALA</strong></div>
        <div class="card-body">
            <a class="btn mb-2" style="background-color: #14b8b8" href="?page=gejala&action=tambah">Tambah</a>
                <table class="table-responsive table-bordered" id="myTable">
    <thead>
        <tr>
            <th width="80px">No</th>
            <th width="200px" >Kode Gejala</th>
            <th width="700px" >Nama Gejala</th>
            <th width="100px"></th>
        </tr>
    </thead>
    
    <tbody>
			<!-- letakkan proses menampilkan disini -->
            <?php
                $no=1;
                $sql = "SELECT*FROM gejala";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['kdgejala']; ?></td>
                    <td><?php echo $row['nmgejala']; ?></td>
                    <td align="center">
                        <a class="btn btn-warning" href="?page=gejala&action=update&id=<?php echo $row['idgejala']; ?>">
                        <i class="fas fa-edit"></i>
                        </a>
                        <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=gejala&action=hapus&id=<?php echo $row['idgejala']; ?>">
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