<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir PPDB</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <form action="simpanppdb.php" method="post">
            <div class="form-group">
                <div class="col-md-12 text-center">
                    <h3>Formulir PPDB</h3>
                </div>
            </div>
            <div class="form-group row">
                
                <label class="col-md-3">Nama</label>
                
                <div class="col-md-9">
                    <input type="text" class="form-control" name="nama" required>
                </div>
            </div>
            <div class="form-group row">
                
                <label class="col-md-3">Tempat Lahir</label>
                
                <div class="col-md-9">
                    <input type="text" class="form-control" name="tempat_lahir" required>
                </div>
            </div>
            <div class="form-group row">
                
                <label class="col-md-3">Tanggal Lahir</label>
                
                <div class="col-md-9">
                    <input type="date" class="form-control" name="tgl_lahir" required>
                </div>
            </div>
            <div class="form-group row">
                
                <label class="col-md-3">Asal Sekolah</label>
                
                <div class="col-md-9">
                    <input type="text" class="form-control" name="asal_sekolah" required>
                </div>
            </div>
            <div class="form-group row">
                
                <label class="col-md-3">No HP</label>
                
                <div class="col-md-9">
                    <input type="text" class="form-control" name="no_hp" required>
                </div>
            </div>
            <div class="form-group row">
                
                <label class="col-md-3">Nilai</label>
                
                <div class="col-md-9">
                    <input type="text" class="form-control" name="nilai" required>
                </div>
            </div>
            <div class="form-group row">
                
                <label class="col-md-3">Jarak Rumah</label>
                
                <div class="col-md-9">
                    <input type="text" class="form-control" name="jarak_rumah" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12 text-center">
                    <input type="submit" name="submit" value="Daftar" class="btn btn-success" onclick="">
                    <input type="reset" name="reset" value="Batal" class="btn btn-danger">
                </div>
            </div>
        </form>
    </div>
</body>
</html>