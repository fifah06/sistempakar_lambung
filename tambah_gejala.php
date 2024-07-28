<?php

if(isset($_POST['simpan'])){

    //mengambil data dari form
    $kdgejala=$_POST['kdgejala'];
    $nmgejala=$_POST['nmgejala'];
    
	
	//proses simpan
        $sql = "INSERT INTO gejala VALUES (Null, '$kdgejala', '$nmgejala')";
        if ($conn->query($sql) === TRUE) {
            header("Location:?page=gejala");
        }
    
}
?>

<!-- letakkan proses tambah data disini -->
<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header text-white border-dark" style="background-color: #14b8b8"><strong>Tambah Data Gejala</strong></div>
	                <div class="card-body">
	                    <div class="form-group">
                            <label for="">Kode Gejala</label>
                                <input type="text" class="form-control" name="kdgejala" maxlength="5" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Gejala</label>
                                <input type="text" class="form-control" name="nmgejala" maxlength="200" required>
                        </div>
                                <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
                                <a class="btn btn-danger" href="?page=gejala">Batal</a>
                    </div>
                </div>
           </div>
        </form>
    </div>
</div>