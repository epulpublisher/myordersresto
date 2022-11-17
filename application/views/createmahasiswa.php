<?php
echo form_open_multipart('mahasiswa/create');
?>
<table border='1'>
<tr>
    <td>Nim</td>
    <td><?php echo form_input('nim'); ?></td>
</tr> 
<tr>
    <td>Nama</td>
    <td><?php echo form_input('nama'); ?></td>
</tr>  
<tr>
    <td>No Tlp</td>
    <td><?php echo form_input('tlp'); ?></td>
</tr>  
<tr>
    <td>Alamat</td>
    <td><?php echo form_input('alamat'); ?></td>
</tr>   
<tr>
    <td colspan="2"><?php echo form_submit('submit','Simpan'); ?>
    <?php echo anchor('mahasiswa','Kembali'); ?>
</td>
</tr>     
</table>
<?php
echo form_close();
?>