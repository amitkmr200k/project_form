$(document).ready(function(){

    $('#role').click(function(){

        $(':checkbox').prop('checked', false);
        // id of selected role
        var id = $(':selected').attr('id');
        // getting the assigned privleges from the hidden field
        var data = $('#privilege_data_hidden').attr('value');
        var display = JSON.parse(data);
        var length = display.length;
        var i=0;

        while(i<length)
        {
            match_role_id = 'role'+display[i].role_id;
            if(id == match_role_id)
            {
                var m = 'resource'+display[i].resource_id+'action'+display[i].action_id;
                $('#'+m).prop('checked', true);
            }
            i++;
        }
    });

    $('#set_privilege').click(function(){

        var role_id = $(':selected').attr('id');
        var checkbox_ids = $('input[type=checkbox]:checked').map(function()
        {
            return $(this).attr('id');
        }).get();

        $.ajax
        ({
            method: 'POST',
            url: 'admin_update_privilege.php',
            dataType: 'json',
            data: 
            { 
                role_id: role_id,
                id: checkbox_ids 
            },
            success: function( msg ) 
            {
              console.log('pass');
              //reloading a section of the page
              $('#reload').load("admin_privilege.php #privilege_data_hidden");
          },
          error: function()
          {
             console.log('fail');
         }
     });   

    });
});
