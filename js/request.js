function requestQuote(){
	$.ajax({
		url: 'includes/request.inc.php',
		dataType: 'html',
		type: 'post',
		data: {action: 'request', fName:$('#fName').val(), lName:$('#lName').val(), company:$('#company').val(),address:$('#address').val(),lName:$('#lName').val(),city:$('#city').val(),state:$('#state').val(),zip_code:$('#zip_code').val(),email:$('#email').val(),phone:$('#phone').val(),fax:$('#fax').val(),file:$('#file').val,ajax:true, submit_request:true},
		success: function(data){
			//console.log(data);
			$('#requestModal').modal('show');
			$('#requestModal').on('hidden.bs.modal', function () {
			  redirect('request', 'home');
			})
						
		}
	});

}