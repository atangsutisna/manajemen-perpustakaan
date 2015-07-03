<h2><span class="glyphicon glyphicon-book"></span> Penerimaan Katalog</h2><hr/>

<form>
    <div class="form-group">
        <?php echo form_label('Tgl terima','tgl_penerimaan', null, 'class="form-control"')?>
        <?php echo form_input('tgl_penerimaan', null, "class='form-control'")?>
    </div>
    <div class="form-group">
        <?php echo form_label('Di terima oleh','penerima', null, 'class="form-control"')?>
        <?php echo form_input('penerima', null, "class='form-control'")?>
    </div>
    <div class="form-group">
        <?php echo form_label('Di terima oleh','pengirim', null, 'class="form-control"')?>
        <?php echo form_input('pengirim', null, "class='form-control'")?>
    </div>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Judul Pustaka</th>
        <th>Pengarang</th>
        <th>Penerbit</th>
        <th>Jml</th>
        <th>#</th>
    </tr>
    <tr>
        <td>1</td>
        <td><input type="text" class="form-control"/></td>
        <td><input type="text" class="form-control"/></td>
        <td><input type="text" class="form-control"/></td>
        <td><input type="number" class="form-control col-lg-2"/></td>
        <td><a href="#"><span class="glyphicon glyphicon-remove"></span></a></td>
    </tr>
</table>
</form>