<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah T_tempatentertaiment</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url().$action ?>">
	  <div class="form-group">
                    <label>id_enterteiment</label>
                    <input type="text" name="id_enterteiment" class="form-control" placeholder="" value="<?php echo $dataedit->id_enterteiment?>" readonly>
            </div>
	  <div class="form-group">
            <label>nama_tempatenter</label>
            <input type="text" name="nama_tempatenter" class="form-control" value="<?php echo $dataedit->nama_tempatenter?>">
    </div>
	  <div class="form-group">
            <label>daerahenter</label>
            <input type="text" name="daerahenter" class="form-control" value="<?php echo $dataedit->daerahenter?>">
    </div>
	  <div class="form-group">
            <label>photo</label>
            <input type="text" name="photo" class="form-control" value="<?php echo $dataedit->photo?>">
    </div>
	  <div class="form-group">
            <label>deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" value="<?php echo $dataedit->deskripsi?>">
    </div>
	  <div class="form-group">
            <label>penilaian</label>
            <input type="text" name="penilaian" class="form-control" value="<?php echo $dataedit->penilaian?>">
    </div>
	  <div class="form-group">
            <label>jam</label>
            <input type="text" name="jam" class="form-control" value="<?php echo $dataedit->jam?>">
    </div>
	  <div class="form-group">
            <label>id_liburan</label>
            <input type="text" name="id_liburan" class="form-control" value="<?php echo $dataedit->id_liburan?>">
    </div>
	  <div class="form-group">
            <label>id_budaya</label>
            <input type="text" name="id_budaya" class="form-control" value="<?php echo $dataedit->id_budaya?>">
    </div>
	
                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
