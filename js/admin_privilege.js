$(document).ready(function(){

    $('#role').click(function(){
       
        $(':checkbox').prop('checked', false);

        // id of selected role
        var id = $(":selected").attr('id');

        // getting the privlege data from the hidden field
        var data = $('#privilege_data_hidden').attr('value');
        var display = JSON.parse(data);
        var count_resource = $('#count_resource').attr('value');
        var length = display.length;
        var i=0;

        while(i<length)
        {
            x="role"+display[i].role_id;
            if(id == x)
            {
                var m = 'resource'+display[i].resource_id+'action'+display[i].privilege_id;
                $('#'+m).prop('checked', true);
            }
         i++;
     }

     i=0;

 });
});