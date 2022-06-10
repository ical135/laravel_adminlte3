<style type="text/css">
	td.dt-center { text-align: center; }
	td.dt-right { text-align: right; }
	td.dt-left { text-align: left; }
</style>

<table id="idTable" class="table table-bordered table-striped table-hover display responsive nowrap" style="width:100%;">
	<thead>
	<tr>
		<th style="width:1%; text-align:center;" class="all">No.</th>
		<th style="width:4%; text-align:center;" class="all">Opsi</th>
		<th style="width:10%; text-align:center;">Name</th>
		<th style="width:10%; text-align:center;">Username</th>
		<th style="width:10%; text-align:center;">Email</th>
		<th style="width:10%; text-align:center;">Last Modified</th>
	</tr>
	</thead>
</table>

<script type="text/javascript">
	var table = $('#idTable').DataTable({
		"processing": true,
		"serverSide": true,
		"ordering" : true,
		"ajax": "{{ url($class_link.'/table_data') }}",
		"language" : {
			"lengthMenu" : "Tampilkan _MENU_ data",
			"zeroRecords" : "Maaf tidak ada data yang ditampilkan",
			"info" : "Menampilkan data _START_ sampai _END_ dari _TOTAL_ data",
			"infoFiltered": "",
			"infoEmpty" : "Tidak ada data yang ditampilkan",
			"search" : "Cari :",
			"loadingRecords": "Memuat Data...",
			"processing":     "Sedang Memproses...",
			"paginate": {
				"first":      '<span class="fas fa-fast-backward"></span>',
				"last":       '<span class="fas fa-fast-forward"></span>',
				"next":       '<span class="fas fa-forward"></span>',
				"previous":   '<span class="fas fa-backward"></span>'
			}
		},
        "columns": [
            { data: "DT_RowIndex", name: "DT_RowIndex", className: "dt-center", orderable: "false", searchable: "false" },
            { data: "opsi", name: "opsi", className: "dt-center", orderable: "false", searchable: "false" },
            { data: "name", name: "name" },
            { data: "username", name: "username" },
            { data: "email", name: "email" },
            { data: "updated_at", name: "updated_at" }
        ],
		"order":[5, 'desc'],
	});
</script>