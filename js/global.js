function redirect(form, content){
	document.forms[form].elements['content'].value = content;
	document.forms[form].submit();
}

function formSubmit(form, action){
	document.forms[form].elements['content'].value = action;
	document.forms[form].submit();
}
function sendQuote(){
	$.ajax({
		url: 'includes/request.inc.php',
		dataType: 'html',
		type: 'post',
		data: {action: 'request', fName:$('#fName').val(), 
		lName:$('#lName').val(), company:$('#company').val(),
		address:$('#address').val(),lName:$('#lName').val(),
		city:$('#city').val(),state:$('#state').val(),zip_code:$('#zip_code').val(),
		email:$('#email').val(),phone:$('#phone').val(),fax:$('#fax').val(),
		part_num:$('#part_num').val(),drawing_num:$('#drawing_num').val(),quantity:$('#quantity').val(),
		file:$('#file').val,ajax:true, submit_request:true},
		success: function(data){
			//console.log(data);
			$('#myModal').modal('hide');
			$('#requestModal').modal('show');
			$('#requestModal').on('hidden.bs.modal', function () {
			  redirect('request', 'home');
			})
						
		}
	});

}

function checkFields()
{
	var email=document.forms["request"]["email"].value;
	var atpos=email.indexOf("@");
	var dotpos=email.lastIndexOf(".");
	var fname=document.forms["request"]["fName"].value;
	var lname=document.forms["request"]["lName"].value;
	var state=document.forms["request"]["state"].value;
	var city=document.forms["request"]["city"].value;
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
	  {
		  alert("Not a valid e-mail address");
		  return false;
	  }
	else if (email==null || email=="" || fname==null || fname=="" || lname==null || lname=="")
	  {
		  alert("test");
		  return false;
	  }
	else
		{ 
			sendQuote();
		}
}
function checkItemStatus(){
	var hiddenDiv = document.getElementById("claim-form");
	var select = document.getElementById("status_id");
	hiddenDiv.style.display = (select.options[select.selectedIndex].text == "Claimed") ? "block":"none";
}