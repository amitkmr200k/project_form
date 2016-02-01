$(document).ready(function()
{
	$("#login").click(function()
    {
		var user_name_client =$.trim($("#user_name_jq").val());
        var password_client =$.trim($("#password_jq").val());
//declaring array for storing the errors	
		var error_client=["",""];
    	if(user_name_client=="")
    	{	
            error_client[0]="Username cannot be blank";
    	}
    	else if(!user_name_client.match( /^[a-zA-Z0-9@_]*$/))
    	{	
    		error_client[0]="Only charatcers,numbers, @ and underscore(_) allowed in user name";
    	}
    	if(password_client=="")
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
        {   
            $.ajax({
                method: "POST",
                url: "validate_login.php",
                dataType: 'json',
               // cache: false,
                data: {
                    user_name: user_name_client, 
                    password: password_client 
                },
                success: function( msg ) 
                {
                    if(msg.login=="correct")
                    {
                        window.location.replace("home.php");
                    }  
                    else
                    {   
                       if(msg.activate!="")
                            $("#activate_error").text(msg.activate).css("font-size","100%").css("color","red");
                        else
                        {
                            $("#fix_error").text("Fix the following errors").css("color","red");
                            $("#user_name_error").text(msg.user_name).css("font-size","100%");
                            $("#password_error").text(msg.password).css("font-size","100%");        
                        }
                    }
                }
            });
    	}
	});	
});