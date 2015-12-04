function employmentRequest(){
	$.ajax({
		url: 'includes/employment.inc.php',
		dataType: 'html',
		type: 'post',
		data: {action: 'request', fName:$('#fName').val(), lName:$('#lName').val(),
		company:$('#company').val(),address:$('#address').val(),
		lName:$('#lName').val(),city:$('#city').val(),state:$('#state').val(),
		zip_code:$('#zip_code').val(),email:$('#email').val(),phone:$('#phone').val(),
		fax:$('#fax').val(),position:$('#position').val(),shift:$('#shift').val(),
		comments:$('#comments').val(),ajax:true, submit_request:true},
		success: function(data){
			//console.log(data);
			$('#employmentModal').modal('show');
			$('#employmentModal').on('hidden.bs.modal', function () {
			  redirect('employment', 'home');
			})
						
		}
	});
}

function requiredEmploymentFields()
{
	var email=document.forms["employment"]["email"].value;
	var position=document.forms["employment"]["position"].value;
	var shift=document.forms["employment"]["shift"].value;
	var atpos=email.indexOf("@");
	var dotpos=email.lastIndexOf(".");
	var fName=document.forms["employment"]["fName"].value;
	var lName=document.forms["employment"]["lName"].value;
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
	  {
		  alert("Not a valid e-mail address");
		  return false;
	  }
	else if (email==null || email=="" || fName==null || fName=="" || lName==null || lName=="")
	  {
		  alert("Please provide a first and last name.");
		  return false;
	  }
	else if (position==null || position=="")
	  {
		  alert("Please provide a position you are interested in.");
		  return false;
	  }
	else if (shift==null || shift=="")
	  {
		  alert("Please provide the shift you are interested in.");
		  return false;
	  }
	else
		{ 
			employmentRequest();
		}
}