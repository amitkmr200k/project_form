$(document).ready(function(){
	 //on pressing enter submit the form
    $('#edit_profile_form').keypress(function(e)
    {
        var key = e.which;
        
        if (key == 13)
        {
            $("#edit").click();
        }
    });
//checking for unique email id 		
$("#email_id_ed").blur(function()
{
		var email_id  = $.trim($('#email_id_ed').val());		
		$.ajax
		({
			method: "POST",
			url: "email_validation_edit.php",
			dataType: 'json',
			data: 
			{ 
                email_id: email_id 
            },
            success: function( msg ) 
            {
            	if(msg.email_id=="1")
            	{
            		$('#email').text("already exits");	
            	}
            	else
            	{
            		$('#email').text("");
            	}
            }
        });   
	});
$("#edit").click(function(){
//getting the values from input box and storing it in variables
var first_name  = $.trim($("#first_name").val());
var middle_name = $.trim($('#middle_name').val());
var last_name = $.trim($('#last_name').val());
var email_id   =  $.trim($('#email_id_ed').val());
var age =  $.trim($('#age').val());
var employment =  $.trim($('#employment').val());
var employer =  $.trim($('#employer').val());
var residence_street  = $.trim($('#residence_street').val());
var residence_city  = $.trim($('#residence_city').val());
var residence_state  = $.trim($('#residence_state').val());
var residence_pincode  = $.trim($('#residence_pincode').val());
var residence_contact_no  = $.trim($('#residence_contact_no').val());
var residence_fax_no  = $.trim($('#residence_fax_no').val());
var permanent_street = $.trim($('#permanent_street').val());
var permanent_city  = $.trim($('#permanent_city').val());
var permanent_state  = $.trim($('#permanent_state').val());
var permanent_pincode  = $.trim($('#permanent_pincode').val());
var permanent_contact_no  = $.trim($('#permanent_contact_no').val());
var permanent_fax_no = $.trim($('#permanent_fax_no').val());
//declaring array for storing the errors	
var error_client =new Array();
//assigning defalut value	
	for(i = 0;i<= 20;i++)
		{error_client[i] = "";}	
//validating first name	
	if(first_name=="")
	{
		error_client[0] = "can't be blank";
	}
	else if(!first_name.match( /^[a-zA-Z]*$/))
	{
		error_client[0] = "Enter alphabets only";
	}			
//validating middle name
	if(!middle_name.match( /^[a-zA-Z .]*$/))
	{
		error_client[1] = "alphabets,.,spaces only";	
	}
	//validating last name
	if(!last_name.match( /^[a-zA-Z .]*$/))
	{
		error_client[2]="alphabets,.,spaces only";
	}		
//validating Resdence Address	
//validating residence street
	if(residence_street=="")
	{
		error_client[4] = "can't be blank";
	}	
	else if(!residence_street.match( /^[a-zA-Z0-9 .]*$/))
	{
		error_client[4] = "Not valid entry";

	}
//validating residence city
	if(residence_city=="")
	{
		error_client[5] = "can't be blank";
	}	
	else if(!residence_city.match( /^[a-zA-Z .]*$/))
	{
		error_client[5] = "alphabet,space,dot only";
	}
//validating residence state
	if(residence_state=="")
	{
		error_client[6] = "can't be blank";
		//
	}
	else if(!residence_state.match( /^[a-zA-Z .]*$/))
	{
		error_client[6] = "alphabet,space,dot only";
	}
//validating residence pincode
	if(residence_pincode=="")
	{
		error_client[7] = "can't be blank";	
	}	
	else if(!residence_pincode.match( /^([0-9]{6})*$/))
	{
		error_client[7] = "only digits";
	}
//validating residence contact no
	if(residence_contact_no == "")
	{
		error_client[8] = "can't be blank";	
	}
	else if(!residence_contact_no.match( /^([0-9]{10})*$/))
	{
		error_client[8] = "only digits";
	}
//validating residence fax no
	if(!residence_fax_no.match( /^([0-9]{10})*$/))
	{
		error_client[9] = "only digits";
	}
//validating permanent address
//validating permanent street
	if(permanent_street=="")
	{
		error_client[10] = "can't be blank";	
	}	
	else if(!permanent_street.match( /^[a-zA-Z0-9 .]*$/))
	{
		error_client[10] = "Not valid entry";
	}
//validating permanent city
	if(permanent_city=="")
	{
		error_client[11] = "can't be blank";
	}	
	else if(!permanent_city.match( /^[a-zA-Z .]*$/))
	{
		error_client[11] = "alphabet,space,dot only";
	}
//validating permanent state
	if(permanent_state=="")
	{
		error_client[12] = "can't be blank";	
	}
	else if(!permanent_state.match( /^[a-zA-Z .]*$/))
	{
		error_client[12] = "alphabet,space,dot only";
	}
//validating permanent pincode
	if(permanent_pincode=="")
	{
		error_client[13] = "can't be blank";	
	}	
	else if(!permanent_pincode.match( /^([0-9]{6})*$/))
	{
		error_client[13] = "only digits";
	}
//validating permanent contact no
	if(permanent_contact_no=="")
	{
		error_client[14] = "can't be blank";	
	}
	else if(!permanent_contact_no.match( /^([0-9]{10})*$/))
	{
		error_client[14]="only digits";
	}
//validating permanent fax no
	if(!permanent_fax_no.match( /^([0-9]{10})*$/))
	{
		error_client[15] = "only digits";
	}	
	//validating age
	if(age=="")
	{
		error_client[18] = "can't be blank";	
	}
	else if(!age.match( /^[0-9]*$/))
	{
		error_client[18] = "only digits";
	}
// validating email id
	if($('#email').text()!="already exits")
	{	
		if(email_id=="")
		{
			error_client[19]="can't be blank";
		
		}
		else if(!email_id.match( /^[a-z0-9_-]+@[a-z0-9._-]+\.[a-z]+$/i))
		{
			error_client[19]="Not Valid";
		}	
	}
//validating employer	
	if(employment=="yes")
	{
		if(employer=="")
		{
			error_client[20] = "can't be blank";
		}
		else if(!employer.match( /^[a-zA-Z .]*$/))	
		{
			error_client[20] = "characters,spaces,dots only "
		}	
	}
	else
	{
		if(employer!="")	
		{
			error_client[20] = "select Employed as \"yes\" first";
		}
	}									
//checking for errors
	var flag = 1;
	for(i = 0;i<= 20;i++)
	{
		if(error_client[i]!="")
		{
			flag = 0;
			break;
		}
	}	
	if(flag==0)
	{
		$("#fname").text(error_client[0]);
		$('#mname').text(error_client[1]);
		$('#lname').text(error_client[2]);
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
		$('#age_error').text(error_client[18]);
		if($('#email').text()!="already exits")
		{	
			$('#email').text(error_client[19]);
		}
		$('#employer_error').text(error_client[20]);
		return false;	
	}
	else
	{
		return true;
	}
});
});

