<div class="table-responsive">
  <div class="card">
    <div class="card-header text-white border-dark" style="background-color: #14b8b8"><strong>DATA USERS</strong></div>
        <div class="card-body">
            <a class="btn mb-2" style="background-color: #14b8b8" href="?page=users&action=tambah">Tambah</a>
                <table class="table-responsive table-bordered" id="myTable">
    <thead>
        <tr>
            <th width="50px">No.</th>
            <th width="400px" >Username</th>
            <th width="400px" >Role</th>
            <th width="100px"></th>
        </tr>
    </thead>
    
    <tbody>
			<!-- letakkan proses menampilkan disini -->
            <?php
                $no=1;
                $sql = "SELECT*FROM users ORDER BY username ASC";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['role']; ?></td>
                    <td align="center">
                        <a class="btn btn-warning" href="?page=users&action=update&id=<?php echo $row['idusers']; ?>">
                        <i class="fas fa-edit"></i>
                        </a>
                        <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=users&action=hapus&id=<?php echo $row['idusers']; ?>">
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