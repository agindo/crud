var managePosisiTable;

$(document).ready(function(){
	managePosisiTable = $("#managePosisiTable").DataTable();
});

function addPosisi(){
	$("#createForm")[0].reset();

	$(".text-danger").remove();

	$(".form-group").removeClass('has-error').removeClass('has-success');

	$("#createForm").unbind('submit').bind('submit', function(){
		var form = $(this);

		$(".text-danger").remove();

		$.ajax({
			url: form.attr('action'),
			type: form.attr('method'),
			data: form.serialize(),
			dataType: 'json',
			success: function(response){
				if(response.success == true){
					$(".messages").html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Warning!</strong>'+response.messages+'</div>');
					$("#myModal").modal('hide');
					// managePosisiTable.ajax.reload(null, false);
				}else{
					if(response.messages instanceof Object){
						$.each(response.messages, function(index, value){
							var id = $("#"+index);
							id
							.closest('.form-group')
							.removeClass('has-error')
							.removeClass('has-success')
							.addClass(value.length > 0 ? 'has-error':'has-success')
							.after(value);
						});
					}else{
						$(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Warning!</strong>'+response.messages+'</div>');
					}
				}
			}
		});

		return false;
	});
}