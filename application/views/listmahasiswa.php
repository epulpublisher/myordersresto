<a href="http://localhost/restfulapi/mahasiswa/create">Tambah Data</a>
<table border="1">
    <tr>
        <th>NIM</th>
        <th>NAMA</th>
        <th>Alamat</th>
        <th>Telepohone</th>
        <th>OPSI</th>
    </tr>
    <?php
    foreach ($mahasiswa as $mhs) {
        $nim = $mhs['nim'];
        $nama = $mhs['nama'];
        $alamat = $mhs['alamat'];
        $tlp = $mhs['tlp'];
        echo " <tr>
 <td>$nim</td>
 <td>$nama</td>
 <td>$alamat</td>
 <td>$tlp</td>
 <td>" . anchor('mahasiswa/edit/' . $nim, 'EDIT') . "
 " . anchor('mahasiswa/delete/' . $nim, 'Delete') . "
 </td>
 </tr> ";
    }
    ?>
</table>