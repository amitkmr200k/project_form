$(document).ready(function () {
    $('#grid').jqGrid({
        url: 'admin_display_data.php',
        datatype: 'json',
        multiselect: true,
        mtype: 'POST',
        colNames: [
        'User Id','User Name','First Name', 'Middle Name','Last Name','Age',
        'Gender','Date of Birth','marital_status','employed','employer',
        'residence_street','residence_city','residence_state',
        'residence_pincode','residence_contact_no','residence_fax_no','Tweets'
        ],
        colModel: [
        { name: 'id',width: 30,editable: true},
        { name: 'user_name',width: 60,editable: true},
        { name: 'first_name',width: 60,editable: true},
        { name: 'middle_name',width: 60,editable: true},
        { name: 'last_name',width: 60,editable: true},
        { name: 'age',width: 60,editable: true},
        { name: 'gender',width: 60,editable: true},
        { name: 'dob',width: 60,editable: true},
        { name: 'marital_status',width: 60,editable: true},
        { name: 'employment',width: 60,editable: true},
        { name: 'employer',width: 60,editable: true},
        { name: 'residence_street',width: 60,editable: true},
        { name: 'residence_city',width: 60,editable: true},
        { name: 'residence_state',width: 60,editable: true},
        { name: 'residence_pincode',width: 60,editable: true},
        { name: 'residence_contact_no',width: 60,editable: true},
        { name: 'residence_fax_no',width: 60,editable: true},
        { name: 'act',index: 'act', width: 60,sortable: false}
        ],
        pager: '#perpage',
        rowNum: 10,
        rowList: [10,20],
        sortname: 'id',
        sortorder: 'asc',
        height: 'auto',
        viewrecords: true,
        gridview: true,
        caption: 'User Information',
        gridComplete: function ()
        {
            var ids        = $('#grid').jqGrid('getDataIDs');
            var ids_length = ids.length;

            for (var i = 0; i < ids_length; i++)
            {
                view_tweet = '<input id ="tweet" type="button" onclick="modal()" class="btn btn-primary" data-toggle="modal"  value="View" />';
                $('#grid').jqGrid('setRowData', ids[i], {act: view_tweet});
            }

            $('#grid').navGrid('#perpage', { edit: true, add: false, del: true,
                search: true, refresh: true, view: false, position: 'left', cloneToTop: true });
        },
        editurl: 'admin_update_data.php'
    });
});

function modal()
{
    $(document).ready(function () {
        var id = $('#grid').jqGrid('getGridParam','selrow');
        if (id)
        {
            var ret   = $('#grid').jqGrid('getRowData',id);
            user_name = ret.user_name;

            $.ajax({
                method: 'POST',
                url: 'twitter.php',
                dataType: 'json',
                data: 
                {
                    user_name: user_name
                },
                success: function ( msg )
                {
                    $('#modal_content').html(msg.tweet);
                    $('#myModal').modal('show');
                },
                error: function ()
                {
                    console.log('fail');
                }

            });
        }
        else
        {
            alert('Please select row');
        }//end if
    });
}//end modal()