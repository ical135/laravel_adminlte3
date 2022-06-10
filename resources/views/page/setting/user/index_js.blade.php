<script type="text/javascript">
	open_table();
	first_load('{{ $idBoxLoader }}', '{{ $idBoxContent }}');

	$(document).off('click', '#{{ $idBtnAdd }}').on('click', '#{{ $idBtnAdd }}', function() {
		open_form_main('Add', '');
	});

	function moveTo(div_id) {
		$('html, body').animate({ scrollTop: $('#'+div_id).offset().top - $('header').height() }, 1000);
	}

	function open_table() {
		$('#<?php echo $idBoxContent; ?>').slideUp(function(){
			$.ajax({
				type: 'GET',
				url: '{{ url($class_link."/partial_table_main") }}',
				success: function(html) {
					$('#{{ $idBoxContent }}').html(html);
					$('#{{ $idBoxContent }}').slideDown();
					moveTo('idMainContent');
				}
			});
		});
	}

	function open_form_main(sts, id) {
		$.ajax({
			type: 'GET',
			url: '{{ url($class_link."/partial_form_main") }}',
			data: {sts: sts, id: id},
			success: function(html) {
				toggle_modal('Form User '+ sts, html);
				render_select2('.select2');
			}
		});
	}

	function first_load(loader, content) {
		$('#'+loader).fadeOut(500, function(e){
			$('#'+content).slideDown();
		});
	}

	function toggle_modal(modalTitle, htmlContent){
		$('#{{ $idModal }}').modal('toggle');
		$('.modal-title').text(modalTitle);
		$('#{{ $idModalContent }}').slideUp();
		$('#{{ $idModalContent }}').html(htmlContent);
		$('#{{ $idModalContent }}').slideDown();
	}

	function edit_data(sts, id){
		open_form_main(sts, id);
	}

	function delete_data(data){
		var conf = confirm('Apakah kamu yakin ?');
		if (conf){
			var id = $(data).attr("data-id");
			var _token = $(data).attr("data-token");

			$.ajax({
				url: "{{ route('User.destroy') }}",
				type: 'PUT',
				dataType: "JSON",
				data: {
					"id": id,
					"_method": 'PUT',
					"_token": _token,
				},
				success: function (data)
				{
					if (data.code == 200){
						open_table();
						sweetalert2 ('success', data.messages);
					}else if (data.code == 400){
						sweetalert2 ('error', data.messages);
					}else{
						sweetalert2 ('error', 'Unknown Error');
					}
				}
			});
		}
	}

    function sweetalert2 (type, title) {
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 7000
		});

		// TYPE : success, info, error, warning
      	Toast.fire({
        	type: type,
        	title: title
      	})
    }

    function generateToken (csrf){
        $('input[name="_token"]').val(csrf);
	}

	function resetButtonSubmit(attrBtnSubmit){
		$(attrBtnSubmit).html('<i class="fa fa-save"></i> Save');
		$(attrBtnSubmit).attr('disabled', false);
	}

	function submitData(form_id) {
		event.preventDefault();
		var form = $('#'+form_id)[0];
		var url = "{{ route('User.store') }}";

		// Loading animate
		$('#idbtnSubmit'+form_id).html('<i class="fa fa-spinner fa-pulse"></i> Loading');
		$('#idbtnSubmit'+form_id).attr('disabled', true);

		$.ajax({
			url: url ,
			type: "POST",
			data:  new FormData(form),
			contentType: false,
			cache: false,
			processData:false,
			success: function(data){
				console.log(data);
				if (data.code == 200){
					$('.errInput').html('');
					toggle_modal('', '');
					open_table();
					sweetalert2 ('success', data.messages);
				}else if ( data.code == 401){
					sweetalert2 ('warning', data.messages + '<br>' + data.data);
					generateToken (data._token);
				}else if (data.code == 400){
					sweetalert2 ('error', data.messages);
					generateToken (data._token);
				}else{
					sweetalert2 ('error', 'Unknown Error');
					generateToken (data._token);
				}
				resetButtonSubmit('#idbtnSubmit'+form_id);
			} 	        
		});
	}

	function render_select2(element){
		$(element).select2({
			theme: 'bootstrap4',
			placeholder: '--Pilih Opsi--',
		});
	}

</script>