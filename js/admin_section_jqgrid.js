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
        'residence_pincode','residence_contact_no','residence_fax_no'
        ],
        colModel: [
        { name: 'id',width:30,editable:true},
        { name: 'user_name',width:60,editable:true},
        { name: 'first_name',width:60,editable:true},
        { name: 'middle_name',width:60,editable:true},
        { name: 'last_name',width:60,editable:true},
        { name: 'age',width:60,editable:true},
        { name: 'gender',width:60,editable:true},
        { name: 'dob',width:60,editable:true},
        { name: 'marital_status',width:60,editable:true},
        { name: 'employment',width:60,editable:true},
        { name: 'employer',width:60,editable:true},
        { name: 'residence_street',width:60,editable:true},
        { name: 'residence_city',width:60,editable:true},
        { name: 'residence_state',width:60,editable:true},
        { name: 'residence_pincode',width:60,editable:true},
        { name: 'residence_contact_no',width:60,editable:true},
        { name: 'residence_fax_no',width:60,editable:true}  
            ],  
            pager: '#perpage',
            rowNum: 10,
            rowList: [10,20],
            sortname: 'id',
            sortorder: 'asc',
            height: 'auto',
            viewrecords: true,
            gridview: true,
            caption: 'User Data',
            gridComplete: function(){
              $('#grid').navGrid('#perpage', { edit: true, add: false, del: true, 
                search: true, refresh: true, view: false, position: 'left', cloneToTop: true }); 
          },
          editurl: 'admin_update_data.php',
      });
});