<?php
    require_once 'koneksi.php';
    if(!$conn){
		die("KONEKSI GAGAL: ".mysqli_connect_error());

	} else {
		//echo("KONEKSI SUKSES");
	}

    //string untuk query
    $sql = "SELECT * FROM tmahasiswa INNER JOIN tnilai WHERE tmahasiswa.NIM = tnilai.NIM 
            AND tnilai.UTS < 60 AND tnilai.UAS > 60 ORDER BY tmahasiswa.NIM ASC";

    //JALANKAN QUERY
    $r = mysqli_query($conn,$sql);

    //SIMPAN KE ARRAY
    $result = array();

    while($row = mysqli_fetch_array($r)){
        array_push($result, array(
            "nim"=>$row['NIM'],
            "nama"=>$row['NamaLengkap'],
            "kelas"=>$row['KELAS'], 
            "uts"=>$row['UTS'],
            "uas"=>$row['UAS']           
        ));
    }
    echo json_encode($result);
    mysqli_close($conn);
?>