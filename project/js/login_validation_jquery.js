$(document).ready(function()
{
	$("#login").click(function()
    {
		var user_name =$.trim($("#user_name_jq").val());
        var password =$.trim($("#password_jq").val());
//declaring array for storing the errors	
		var error_client=["",""];
    	if(user_name=="")
    	{	
            error_client[0]="Username cannot be blank";
    	}
    	else if(!user_name.match( /^[a-zA-Z0-9@_]*$/))
    	{	
    		error_client[0]="Only charatcers,numbers, @ and underscore(_) allowed in user name";
    	}
    	if(password=="")
        {   
            error_client[1]="Password cannot be blank";
        }
// if error is found  
        if(error_client[0]!="" || error_client[1]!="" )   
    	{      
            $("#fix_error").text("Fix the following errors").css("color","red");
            $("#user_name_error").text(error_client[0]).css("font-size","100%");
            $("#password_error").text(error_client[1]).css("font-size","100%");
    		return false;	
    	}
    	else
        {   //alert("success");
            return true;
    	}

	});	
});