
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title bg-primary">
                <h5>Master Data Produk</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up text-white"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" width="100%" id="main-table">
	                    <thead>
		                    <tr>
		                        <th width="5%">#</th>
		                        <!-- <th width="30%">Id Produk</th> -->
		                        <th width="20%">Nama</th>
		                        <th width="35%">Deskripsi</th>
		                        <th width="10%">Harga</th>
		                        <th width="20%">Kategori</th>
		                        <th width="20%">Gambar</th>
								<th width="10%">Action</th>								
		                    </tr>
	                    </thead>
	                    <tbody>
	                    </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    </div>
</div>

<div class="modal inmodal" id="add_Produk_mdl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Tambah Data Dokter</h4>
            </div>
            <form method="post" action="" enctype="multipart/form-data" id="myform">
            <div class="modal-body">            	
            	<div class="form-row">
            		<div class="form-group col">
            			<label>Nama Produk</label>
            			<input type="text" class="form-control" id="produk_nama" name="produk_nama" placeholder="Nama" required>
            		</div>
            	</div>
            	<div class="form-row">
            		<div class="form-group col">
            			<label>Deskripsi</label>
            			<textarea type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" rows="4" cols="50"></textarea>
            		</div>
            	</div>
            	<div class="form-row">
            		<div class="form-group col">
            			<label>Harga</label>
            			<input type="number" class="form-control" id="harga" name="harga" placeholder="Harga" onkeypress="return isNumberKey(event)" required>            			
            		</div>
            	</div>
            	<div class="form-row">
	            	<div class="form-group col">
	        			<label>Kategori</label>
	        			<select class="form-control" id="kategori" name="kategori" required>
	        				<option value="" disabled selected>Pilih...</option>
	        			</select>
	        		</div>
            	</div>
            	<div class="form-row">
	            	<div class="form-group col">
            			<label>Gambar</label>
            			<input type="file" class="form-control" id="file" name="file">
            			<p>Gambar format (.jpg, .png, .jpeg,)</p>            			
            		</div>
            	</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="save_add_Produk()">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal inmodal" id="edit_Produk_mdl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="header_edit_Produk"></h4>
            </div>
            <form method="post" action="" enctype="multipart/form-data" id="myform_edit">
            <div class="modal-body">
            	<div class="form-row" style="display: none;">
            		<div class="form-group col">
            			<label>ID</label>
            			<input type="text" class="form-control" id="produk_id_edit" name="produk_id" readonly="true">
            		</div>
            	</div>
            	<div class="form-row" style="display: none;">
            		<div class="form-group col">
            			<label>ID</label>
            			<input type="text" class="form-control" id="file_prev" name="file_prev" readonly="true">
            		</div>
            	</div>
            	<div class="form-row">
            		<div class="form-group col">
            			<label>Nama Produk</label>
            			<input type="text" class="form-control" id="produk_nama_edit" name="produk_nama_edit" placeholder="Nama" required>
            		</div>
            	</div>
            	<div class="form-row">
            		<div class="form-group col">
            			<label>Deskripsi</label>
            			<textarea class="form-control" id="deskripsi_edit" name="deskripsi_edit" placeholder="Deskripsi" rows="4" cols="50"></textarea>
            		</div>
            	</div>
            	<div class="form-row">
            		<div class="form-group col">
            			<label>Harga</label>
            			<input type="number" class="form-control" id="harga_edit" name="harga_edit" placeholder="Harga" onkeypress="return isNumberKey(event)" required>
            		</div>
            	</div>
            	<div class="form-row">
	            	<div class="form-group col">
	        			<label>Kategori</label>
	        			<select class="form-control" id="kategori_edit" name="kategori_edit" required>
	        				<option value="" disabled selected>Pilih...</option>
	        			</select>
	        		</div>
            	</div>
            	<div class="form-row">
	            	<div class="form-group col">	            		
            			<label>Gambar</label>
		                 <img src="" id="imgView" class="card-img-top img-fluid">
            			<input type="file" class="form-control" id="file_edit" name="file_edit">
            			<p>Gambar format (.jpg, .png, .jpeg,)</p>
            		</div>
            	</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="save_edit_Produk()">Save changes</button>
            </div>
        	</form>
        </div>
    </div>
</div>

<div class="modal inmodal" id="confirm_delete_Produk_mdl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="header_delete_Produk"></h4>
            </div>
            <div class="modal-body">
            	<div class="form-row" style="display: none;">
            		<div class="form-group col">
            			<label>ID</label>
            			<input type="text" class="form-control" id="id_delete" name="id_delete" placeholder="...">
            		</div>
            	</div>
            	<div>
            		<span>
            			Apakah anda yakin?
            		</span>
            	</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="save_delete_Produk()">Yes</button>
            </div>
        </div>
    </div>
</div>



    <!-- Mainly scripts -->
    <script src="<?php echo base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins/toastr/toastr.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url() ?>assets/js/inspinia.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins/pace/pace.min.js"></script>

    <script src="<?php echo base_url() ?>assets/js/plugins/dataTables/datatables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){

			getMainTable();
			getdatakategori();
        });

        function getdatakategori(){
        	$.ajax({
	            url : '<?php echo base_url() ?>Produk/get_data_kategori',
	            method : "POST",
	            async : true,
	            dataType : 'json',
	            success: function(data){
	                 
	                var html = '';
	                var i;
	                for(i=0; i<data.length; i++){
	                    html += '<option value='+data[i].kategori_kode+'>'+data[i].kategori_nama+'</option>';
	                }
	                $('#kategori').html(html);
	                $('#kategori_edit').html(html);
	            }
	        });
        }

	    function getMainTable(){
			var tahun = $('#tahun').val();
			var bulan = $('#bulan').val();
			// alert(tahun+'-'+bulan);
			var role_id = 1;
			var oTable = $('#main-table').DataTable({
					processing: true,
					select: true,
					destroy: true,
					searching: true,
					lengthChange: true,
					pageLength: 10,
					responsive: true,
					dom: '<"html5buttons"B>lTfgitp',
					buttons: {
						buttons: [
							{
								text: '<i class="fa fa-plus-square"></i>&ensp;Tambah Data',
								action: function ( e, dt, node, config ) {
									add_Produk();
								}
							},
						],
						dom: {
							button: {
								tag: "button",
								className: "btn btn-primary btn-sm"
							},
							buttonLiner: {
								tag: null
							}
						}
					},
					ajax:{
						url:"<?=base_url('Produk/get_data')?>",
						type:'GET',
						dataSrc : function(json){
							var return_data = new Array()
							$.each(json['response'], function(i, item){
								var button = '' +
									'<div class="btn-group">' +
										'<button class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit Data" onclick="edit_Produk(\''+item["produk_id"]+'\')"><i class="fa fa-edit"></i>&ensp;Edit</button>' +
										'<button class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete Data" onclick="confirm_delete_Produk(\''+item["produk_id"]+'\')"><i class="fa fa-trash"></i>&ensp;Delete</button>' +
									'</div>'
								return_data.push({
									'no'        	: (i+1),
									'produk_nama'	: item['produk_nama'],
									'deskripsi'		: item['deskripsi'],
									'harga'     	: item['harga'],
									'kategori'  	: item['kategori'],
									'gambar'  	: item['gambar'],
									'action'    	: button
								})
							})
							return return_data
						}
					},
					columns : [
						{data : 'no'},
						{data : 'produk_nama'},
						{data : 'deskripsi'},
						{data : 'harga'},
						{data : 'kategori'},
						{data : 'gambar'},
						{data : 'action'}
					]
				});
	    }

	    function add_Produk(){
	    	$('#produk_nama').val('');
	    	$('#deskripsi').val('');
	    	$('#harga').val('');
	    	$('#file').val('');
	    	$('#add_Produk_mdl').modal('show');
	    }

	    function save_add_Produk(){
	    	var produk_nama = $('#produk_nama').val();
	    	var deskripsi = $('#deskripsi').val();
	    	var harga = $('#harga').val();
	    	var kategori = $('#kategori').val();
	    	var fd = new FormData();
            var files = $('#file')[0].files[0];
            fd.append('produk_nama', produk_nama);
            fd.append('deskripsi', deskripsi);
            fd.append('harga', harga);
            fd.append('kategori', kategori);
            fd.append('file', files);
   
            $.ajax({
                url: '<?php echo base_url() ?>Produk/save_add',	            
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(data) {
	               	console.log(data);
	               	if (data == 1) {
	        			toastr.success('Data berhasil diperbarui','Success');
	    				$('#add_Produk_mdl').modal('hide');
	    				getMainTable();
	               	} else {
	                     toastr.error(data, 'Failed');
	               	}
	            }
            });

	    }

		function edit_Produk(id) {
		   $.ajax({
		      type: 'GET',
		      url: '<?php echo base_url() ?>Produk/get_data_by_id/' + id,
		      dataType: 'json',
		      success: function(data) {

		    	$('#produk_id_edit').val(data.produk_id);
		    	$('#produk_nama_edit').val(data.produk_nama);
		    	$('#deskripsi_edit').val(data.deskripsi);
		    	$('#harga_edit').val(data.harga);
		    	$('#kategori_edit').val(data.kategori).change();
		    	$('#file_prev').val(data.gambar);
		    	if(data.gambar != null)
		    		$('#imgView').attr('src', '<?php echo base_url() ?>/assets/images/'+data.gambar);
		    	else
		    		$('#imgView').hide();

		        $('#header_edit_Produk').html('Edit Data Produk <span class="text-info">'+data.produk_nama+'</span>');
		        $('#edit_Produk_mdl').modal("show");
		      }
		   });

		}

	    function save_edit_Produk(){
	    	var produk_id = $('#produk_id_edit').val();
	    	var file_prev = $('#file_prev').val();
	    	var produk_nama = $('#produk_nama_edit').val();
	    	var deskripsi = $('#deskripsi_edit').val();
	    	var harga = $('#harga_edit').val();
	    	var kategori = $('#kategori_edit').val();

	    	var fd = new FormData();
            var files = $('#file_edit')[0].files[0];
            fd.append('produk_id', produk_id);
            fd.append('produk_nama', produk_nama);
            fd.append('deskripsi', deskripsi);
            fd.append('harga', harga);
            fd.append('kategori', kategori);
            fd.append('file', files);
            fd.append('file_prev', file_prev);

	        $.ajax({
	            type: "POST",
	            url: '<?php echo base_url() ?>Produk/save_edit',
	            data: fd,
                contentType: false,
                processData: false,
                success: function(data) {
	               	console.log(data);
	               	if (data == 1) {
	        			toastr.success('Data berhasil diperbarui','Success');
	    				$('#edit_Produk_mdl').modal('hide');
	    				getMainTable();
	               	} else {
	                     toastr.error(data, 'Failed');
	               	}
	            }
	        });

	    }

		function confirm_delete_Produk(id) {

			$('#id_delete').val(id);

		    $('#header_delete_Produk').html('Confirm Delete Data Produk');

			$('#confirm_delete_Produk_mdl').modal('show');

		}

	    function save_delete_Produk(){
	    	var id = $('#id_delete').val();

	        $.ajax({
	            type: "POST",
	            url: '<?php echo base_url() ?>Produk/save_delete',
	            data: {
	               id: id,
	            },
	            success: function(data) {
	               	console.log(data);
	               	if (data == 1) {
	        			toastr.success('Data berhasil diperbarui','Success');
	    				$('#confirm_delete_Produk_mdl').modal('hide');
	    				getMainTable();
	               	} else {
	                     toastr.error("Data gagal diperbarui", 'Failed');
	               	}
	            }
	        });

	    }

	    function isNumberKey(evt){
		    var charCode = (evt.which) ? evt.which : evt.keyCode
		    if (charCode > 31 && (charCode < 48 || charCode > 57))
		        return false;
		    return true;
		}

    </script>