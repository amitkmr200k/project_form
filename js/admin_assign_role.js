$(document).ready(function(){

    $('#user').click(function(){
        var user_name_selected = $(':selected').attr('name');
        var data               = $('#hidden_user_info').attr('value');
        var display            = $.get(data);
        //var response = $.get(URL that returns a valid JSON string);
        var length             = display.length;
        var i                  = 0;
        show_detail            = '';
        while (i < length)
        {
            match_user_name = display[i].user_name;
            if (user_name_selected == match_user_name)
            {
                show_detail += 'Name : ' + display[i].first_name + ' '
                + display[i].middle_name + ' ' + display[i].last_name + '<br/>';
                show_detail += 'Email ID : ' + display[i].email_id + '<br/>';
                $('#user_info').html(show_detail);
            }
            i++;
        }
    });

    $('#assign_role').click(function(){
        var user_name_selected = $('#user option:selected').attr('value');
        var role_selected =  $("#role option:selected").attr('id');

        $.ajax
        ({
            method: 'POST',
            url: 'admin_update_assigned_role.php',
            dataType: 'json',
            data: 
            { 
                user: user_name_selected,
                role: role_selected
            },
            success: function( msg ) 
            {
                console.log('pass');
            //reloading a section of the page
            $('#reload').load("admin_ssign_role.php #reload_user_info");
            },
            error: function()
            {
                console.log('fail');
            }
        });   
    });
});