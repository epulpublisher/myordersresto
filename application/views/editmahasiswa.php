<?php
echo form_open('mahasiswa/edit/');
?>
<table border='1'>
<tr>
    <td>Nim</td>
    <td><?php echo form_input('nim',$mahasiswa['nim'],"readonly"); ?></td>
</tr> 
<tr>
    <td>Nama</td>
    <td><?php echo form_input('nama',$mahasiswa['nama']); ?></td>
</tr>  
<tr>
    <td>No Tlp</td>
    <td><?php echo form_input('tlp',$mahasiswa['tlp']); ?></td>
</tr>  
<tr>
    <td>Alamat</td>
    <td><?php echo form_input('alamat',$mahasiswa['alamat']); ?></td>
</tr>   
<tr>
    <td colspan="2"><?php echo form_submit('submit','Update'); ?>
    <?php echo anchor('mahasiswa','Kembali'); ?>
</td>
</tr>     
</table>
<?php
echo form_close();
?>