$(document).ready(function () {
    $("#grid").jqGrid({
        loadonce:true,
        url: "admin_display_data.php",
        datatype: 'json',

        mtype: "POST",
        colNames: ["User Id","User Name","First Name", "Middle Name","Last Name","Age",
                    "Gender","Date of Birth","marital_status","employed","employer",
                    "residence_street","residence_city","residence_state",
                    "residence_pincode","residence_contact_no","residence_fax_no"
                    ],
        colModel: [
            { name: "id",width:30,editable:true},
            { name: "user_name",width:60,editable:true},
            { name: "first_name",width:60,editable:true},
            { name: "middle_name",width:60,editable:true},
            { name: "last_name",width:60,editable:true},
            { name: "age",width:60,editable:true},
            { name: "gender",width:60,editable:true},
            { name: "dob",width:60,editable:true},
            { name: "marital_status",width:60,editable:true},
            { name: "employed",width:60,editable:true},
            { name: "employer",width:60,editable:true},
            { name: "residence_street",width:60,editable:true},
            { name: "residence_city",width:60,editable:true},
            { name: "residence_state",width:60,editable:true},
            { name: "residence_pincode",width:60,editable:true},
            { name: "residence_contact_no",width:60,editable:true},
            { name: "residence_fax_no",width:60,editable:true}  
            // { name: "permanent_street",width:60,editable:true},
            // { name: "permanent_city",width:60,editable:true},
            // { name: "permanent_state",width:60,editable:true},
            // { name: "permanent_pincode",width:60,editable:true},
            // { name: "permanent_contact_no",width:60,editable:true},
            // { name: "permanent_fax_no",width:60,editable:true},
            ],  
        pager: "#perpage",
        // autowidth: true,
        // height: '100%',
        // shrinkToFit: false,
        rowNum: 10,
        rowList: [10,20],
        sortname: "id",
        sortorder: "asc",
        height: 'auto',
        viewrecords: true,
        gridview: true,
        caption: "User Data",
        gridComplete: function(){
            var ids = $("#grid").jqGrid('getDataIDs');
            for(var i=0;i<ids.length;i++){
            var cl = ids[i];
            be = "<input style='height:22px;width:40px;' type='button' value='Edit' onclick=\"$('#grid')";
            be += ".jqGrid('editRow','"+cl+"');\"  />"; 
            se = "<input style='height:22px;width:40px;' type='button' value='Save' onclick=\"$('#grid')";
            se += ".jqGrid('saveRow','"+cl+"');\"  />"; 
            ce = "<input style='height:22px;width:50px;' type='button' value='Cancel' onclick=\"$('#grid')";
            ce += ".jqGrid('restoreRow','"+cl+"');\" />"; 
            $("#grid").jqGrid('setRowData',ids[i],{act:be+se+ce});
            }
            $('#grid').navGrid('#perpage', { edit: true, add: false, del: true, 
                search: true, refresh: true, view: false, position: "left", cloneToTop: true });   
        },
        editurl: "update_data.php"
    });
// $(window).resize(function () {
//     $("#grid").jqGrid('setGridHeight', $(window).height() - 200);
//     $("#grid").jqGrid('setGridWidth', $(window).width() - 50);
});