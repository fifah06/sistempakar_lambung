<div class="card">
<div class="card-header text-white border-dark" style="background-color: #14b8b8"><strong>Data Hasil Diagnosa</strong></div>
  <div class="card-body">
      <table class="table table-bordered" id="myTable">
          <thead>
            <tr>
              <th width="80px">No.</th>
              <th width="200px">Tanggal</th>
              <th width="600px">Nama Pasien</th>
              <th width="100px"></th>
            </tr>
          </thead>
          <tbody>
          <?php

     $no=1;
     $sql = "SELECT * FROM diagnosa ORDER BY tanggal DESC";
     $result = $conn->query($sql);
     while($row = $result->fetch_assoc()) {
 ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['tanggal']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td align="center">
                <a class="btn btn-primary" href="?page=diagnosa_adm&action=detail&id=<?php echo $row['iddiagnosa']; ?>">
                    <i class="fas fa-list"></i>
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