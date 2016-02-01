$(document).ready(function(){
// when submit button is clicked
	$("#submit").click(function(){
//getting the values from input box and storing it in variables
		var first_name =$.trim($("#first_name").val());
		var middle_name = $.trim($('#middle_name').val());
		var last_name = $.trim($('#last_name').val());
		var user_name= $.trim($('#user_name').val());
		var password= $.trim($('#password').val());
		var retype_password= $.trim($('#retype_password').val());
		var email_id  = $.trim($('#email_id').val());
		var age= $.trim($('#age').val());
		var employment= $.trim($('#employment').val());
		var employer= $.trim($('#employer').val());
		var residence_street = $.trim($('#residence_street').val());
		var residence_city = $.trim($('#residence_city').val());
		var residence_state = $.trim($('#residence_state').val());
		var residence_pincode = $.trim($('#residence_pincode').val());
		var residence_contact_no = $.trim($('#residence_contact_no').val());
		var residence_fax_no = $.trim($('#residence_fax_no').val());
		var permanent_street= $.trim($('#permanent_street').val());
		var permanent_city = $.trim($('#permanent_city').val());
		var permanent_state = $.trim($('#permanent_state').val());
		var permanent_pincode = $.trim($('#permanent_pincode').val());
		var permanent_contact_no = $.trim($('#permanent_contact_no').val());
		var permanent_fax_no= $.trim($('#permanent_fax_no').val());
	//declaring array for storing the errors	
		var error_client=new Array();
	//assigning defalut value	
		for(i=0;i<=22;i++)
		{error_client[i]="";}	
	//validating first name	
		if(first_name=="")
		{
			error_client[0]="can't be blank";
		//	alert("blank");
		}
		else if(!first_name.match( /^[a-zA-Z]*$/))
		{
			error_client[0]="Enter alphabets only";
		}			
	//validating middle name
		if(middle_name=="")
		{
			error_client[1]="can't be blank";
		//	alert("blank");
		}
		else if(!middle_name.match( /^[a-zA-Z .]*$/))
		{
			error_client[1]="alphabets,.,spaces only";
			
		}
	//validating last name
		if(last_name=="")
		{
			error_client[2]="can't be blank";
		//	alert("blank");
		}
		else if(!last_name.match( /^[a-zA-Z .]*$/))
		{
			error_client[2]="alphabets,.,spaces only";
			
		}
	//validating user name
		if(user_name=="")
		{
			error_client[3]="can't be blank";
		//	alert("blank");
		}	
		else if(!user_name.match( /^[a-zA-Z0-9.@]*$/))
		{
			error_client[3]="alphabet,number,@,dot only";
			
		}
	//validating Resdence Address	
	//validating residence street
		if(residence_street=="")
		{
			error_client[4]="can't be blank";
		//	alert("blank");
		}	
		else if(!residence_street.match( /^[a-zA-Z0-9 .]*$/))
		{
			error_client[4]="Not valid entry";
			
		}
	//validating residence city
		if(residence_city=="")
		{
			error_client[5]="can't be blank";
		//	alert("blank");
		}	
		else if(!residence_city.match( /^[a-zA-Z .]*$/))
		{
			error_client[5]="alphabet,space,dot only";
			
		}
	//validating residence state
		if(residence_state=="")
		{
			error_client[6]="can't be blank";
		//	alert("blank");
		}
		else if(!residence_state.match( /^[a-zA-Z .]*$/))
		{
			error_client[6]="alphabet,space,dot only";
			
		}
	//validating residence pincode
		if(residence_pincode=="")
		{
			error_client[7]="can't be blank";
		//	alert("blank");
		}	
		else if(!residence_pincode.match( /^([0-9]{6})*$/))
		{
			error_client[7]="only digits";
			
		}
	//validating residence contact no
		if(residence_contact_no=="")
		{
			error_client[8]="can't be blank";
		//	alert("blank");
		}
		else if(!residence_contact_no.match( /^([0-9]{10})*$/))
		{
			error_client[8]="only digits";
			
		}
	//validating residence fax no
		if(!residence_fax_no.match( /^([0-9]{10})*$/))
		{
			error_client[9]="only digits";
			
		}
	//validating permanent address
	//validating permanent street
		if(permanent_street=="")
		{
			error_client[10]="can't be blank";
		//	alert("blank");
		}	
		else if(!permanent_street.match( /^[a-zA-Z0-9 .]*$/))
		{
			error_client[10]="Not valid entry";
			
		}
	//validating permanent city
		if(permanent_city=="")
		{
			error_client[11]="can't be blank";
		//	alert("blank");
		}	
		else if(!permanent_city.match( /^[a-zA-Z .]*$/))
		{
			error_client[11]="alphabet,space,dot only";
			
		}
	//validating permanent state
		if(permanent_state=="")
		{
			error_client[12]="can't be blank";
		//	alert("blank");
		}
		else if(!permanent_state.match( /^[a-zA-Z .]*$/))
		{
			error_client[12]="alphabet,space,dot only";
			
		}
	//validating permanent pincode
		if(permanent_pincode=="")
		{
			error_client[13]="can't be blank";
		//	alert("blank");
		}	
		else if(!permanent_pincode.match( /^([0-9]{6})*$/))
		{
			error_client[13]="only digits";
			
		}
	//validating permanent contact no
		if(permanent_contact_no=="")
		{
			error_client[14]="can't be blank";
		//	alert("blank");
		}
		else if(!permanent_contact_no.match( /^([0-9]{10})*$/))
		{
			error_client[14]="only digits";
			
		}
	//validating permanent fax no
		if(!permanent_fax_no.match( /^([0-9]{10})*$/))
		{
			error_client[15]="only digits";
			
		}	
	//validating password
		if(password=="")
		{
			error_client[16]="can't be blank";
		}
	//validating retype password
		if(retype_password=="")
		{
			error_client[17]="can't be blank";
		}
		else if(password!=retype_password)
		{
			error_client[17]="passwords do not match";
			
		}
	//validating age
		if(age=="")
		{
			error_client[18]="can't be blank";
		//	alert("blank");
		}
		else if(!age.match( /^[0-9]*$/))
		{
			error_client[18]="only digits";
			
		}
	// validating email id
		if(email_id=="")
		{
			error_client[19]="can't be blank";
		//	alert("blank");
		}
		else if(!email_id.match( /^[a-z0-9_-]+@[a-z0-9._-]+\.[a-z]+$/i))
		{
			error_client[19]="Not Valid";
			
		}
	//validating employer	
		if(employment=="yes")
		{
			if(employer=="")
			{
				error_client[20]="can't be blank";
			}
			else if(!employer.match( /^[a-zA-Z .]*$/))	
			{
				error_client[20]="characters,spaces,dots only "
			}	
		}
		else
		{
				if(employer!="")	
			{
				error_client[20]="select Employed as \"yes\" first";
				
			}
		}									
	//checking for errors
		if(error_client!="")
		{
			$("#fname").text(error_client[0]);
			$('#mname').text(error_client[1]);
			$('#lname').text(error_client[2]);
			$('#uname').text(error_client[3]);
			$('#resi_street').text(error_client[4]);
			$('#resi_city').text(error_client[5]);
			$('#resi_state').text(error_client[6]);
			$('#resi_pincode').text(error_client[7]);
			$('#resi_contact').text(error_client[8]);
			$('#resi_fax').text(error_client[9]);
			$('#perm_street').text(error_client[10]);
			$('#perm_city').text(error_client[11]);
			$('#perm_state').text(error_client[12]);
			$('#perm_pincode').text(error_client[13]);
			$('#perm_contact').text(error_client[14]);
			$('#perm_fax').text(error_client[15]);
			$('#pass').text(error_client[16]);
			$('#retype_pass').text(error_client[17]);
			$('#age_error').text(error_client[18]);
			$('#email').text(error_client[19]);
			$('#employer_error').text(error_client[20]);
	 	return false;	
		}
		else
		{
			return true;
		}	
	});
});
