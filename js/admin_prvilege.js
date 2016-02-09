$(document).ready(function()
{
    $('#page1_privlege').click(function()
    {
        var     
        $.ajax(
        {
            method: 'POST',
            url: 'validate_login.php',
            dataType: 'json',
            data:
            {
                user_name: user_name_client,
                password: password_client
            },
            success: function( msg )
            {

            }
        });
    });
});