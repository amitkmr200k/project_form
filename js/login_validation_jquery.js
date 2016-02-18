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
            error_client[0]="cannot be blank";
        }
        else if(!user_name_client.match( /^[a-zA-Z0-9@_]*$/))
        {   
            error_client[0]="Only charatcers,numbers, @ and underscore(_) allowed";
        }
        if(password_client=="")
        {   
            error_client[1]="cannot be blank";
        }
// if error is found  
        if(error_client[0]!="" || error_client[1]!="" )   
        {   $("#activate_error").text("");   
            $("#user_name_error").text(error_client[0]).css("font-size","100%").css("color","red");
            $("#password_error").text(error_client[1]).css("font-size","100%").css("color","red");
            return false;   
        }
        else
        { 
        // using ajax 
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
                    if(msg.login == "correct")
                    {   
                        if(msg.login_as_user=='1')
                        window.location.replace("home.php");
                        else
                        window.location.replace("admin_section.php");
                    }  
                    else
                    {    
                       if(msg.activate!= "")
                        {   
                            $("#activate_error").text(msg.activate).css("font-size","100%").css("color","red");
                            $("#user_name_error").text("");
                            $("#password_error").text("");     
                        }
                        else
                        {   $("#activate_error").text("");
                            $("#user_name_error").text(msg.user_name).css("font-size","100%").css("color","red");
                            $("#password_error").text(msg.password).css("font-size","100%").css("color","red"); 

                        }
                    }
                }
            });
        }
    });
    
    $('#login_form').keypress(function(e)
    {
        var key = e.which;
        
        if (key == 13)
        {
            $("#login").click();
        }
    });
});
