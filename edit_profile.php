<?php
require("isset_session.php");
require("header.php"); 
require("fetch_record.php");
require("edit_profile_validation.php");
//function to display data in the text box
function display($row,$name)
{

    if(isset($_POST['submit']))
    {
        return $_POST[$name];
    }
    
    if(!isset($_POST['submit']))
    {

        return $row[$name];
    }
}

function display_message()
{
    echo form_error($error);

    if($_SESSION["value"]==1)
    {
        echo "<p><font color=red>Profile Updated !</font></p><br/>";
        $_SESSION["value"]=0;   
    }

    if($_SESSION["value"]==2)
    {
        echo "<p><font color=red>Password Reset !</font></p><br/>";
        $_SESSION["value"]=0;   
    }
}
?>  
<div class="container">
    <div class="respnosive">
        <div class="jumbotron">
            <h1><font face="times new roman"> Edit Profile</font></h1>
            <?php display_message();?>  
        </div>
    </div>
</div>
<div class="form">
    <div class="container">
        <div class="respnosive">
            <form action="edit_profile.php" enctype="multipart/form-data" method="POST">
                <div class="row">
                    <!--user details-->	
                    <div class="col-sm-4"><b>First name</b><br/><input id="first_name" type="text" 
                        value="<?php echo display($row,'first_name');?>" name="first_name"> 
                    </div>
                    <div class="col-sm-4"><b>Middle name</b><br/><input id="middle_name" type="text" 
                        value="<?php echo display($row,'middle_name');?>" name="middle_name"> 
                    </div>
                    <div class="col-sm-4"><b>Last name </b><br/><input id="last_name" type="text" 
                        value="<?php echo display($row,'last_name');?>" name="last_name"> 
                    </div>
                    <div class="col-sm-4"><p id="fname" class="error"></p></div>
                    <div class="col-sm-4"><p id="mname" class="error"></p></div>
                    <div class="col-sm-4"><p id="lname" class="error"></p></div>
                </div>	
                <div class="row">
                    <div class="col-sm-4"><b>email id </b><br/><input id="email_id_ed" type="text" 
                        value="<?php echo display($row,'email_id');?>" name="email_id">
                    </div>
                    <div class="col-sm-4"><b>Age </b><br/><input id="age" type="text" 
                        value="<?php echo display($row,'age');?>" name="age">
                    </div>
                    <div class="col-sm-4"><b>DOB</b><br/><input id="dob" type="date" 
                        value="<?php echo display($row,'dob');?>" name="dob">
                    </div>
                    <div class="col-sm-4"><p id="email" class="error"></p></div>
                    <div class="col-sm-4"><p id="age_error" class="error"></p></div>
                    <div class="col-sm-4"><p id="dob" class="error"></p></div>
                </div>	
                <div class="row">
                    <div class="col-sm-4"><b>Gender</b><br/> 
                        <input id="" type="radio" name="gender" value="male" 
                        <?php 
                        $gender=display($row,'gender');
                        if($gender=="male") {echo "checked";}?> >male<br/>
                        <input id="" type="radio" name="gender" value="female" 
                        <?php
                        $gender=display($row,'gender'); 
                        if($gender=="female") {echo "checked";}?> >female<br/>
                    </div>
                    <div class="col-sm-4"><b>Marital Status</b><br/>
                        <select name="marital_status">
                            <option value="married" <?php 
                            $marital_status=display($row,'marital_status');
                            if( $marital_status=="married") {echo "selected";}
                            ?> >married</option> 
                            <option value="unmarried" <?php 
                            $marital_status=display($row,'marital_status');
                            if($marital_status=="unmarried") {echo "selected";}
                            ?> >unmarried</option>      
                        </select>
                    </div>
                    <div class="col-sm-4"><b>Employed</b><br/>
                        <select id="employment" name="employment">
                            <option value="yes" 
                            <?php 
                            $employment=display($row,'employment');
                            if($employment=="yes") {echo "selected";}?> >yes</option>
                            <option value="no"
                            <?php 
                            $employment=display($row,'employment');
                            if($employment=="no") {echo "selected";}?> >no</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4"><b>Employer</b><br/><input id="employer" type="text" 
                        value="<?php echo display($row,'employer');?>" name="employer">
                    </div>
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4"><p id="employer_error" class="error"></p></div>
                </div>
                <!-- Residence Address -->	
                <div class="address">
                    <div class="row">
                        <div class="col-sm-4"><h4><strong>Residence address</strong></h4></div>
                        <br/><br/><br/>
                        <div class="col-sm-4">
                            <b>Street</b><br/>
                            <input id="residence_street" type="text" 
                            value="<?php echo display($row,'residence_street');?>" name="residence_street">
                        </div>
                        <div class="col-sm-4">
                            <b>City</b><br/>
                            <input id="residence_city" type="text" 
                            value="<?php echo display($row,'residence_city');?>" name="residence_city">
                        </div>
                        <div class="col-sm-4">
                            <b>State</b><br/>
                            <input id="residence_state" type="text" 
                            value="<?php echo display($row,'residence_state');?>" name="residence_state">
                        </div>
                        <div class="col-sm-4"><p id="resi_street" class="error"></p></div>
                        <div class="col-sm-4"><p id="resi_city" class="error"></p></div>
                        <div class="col-sm-4"><p id="resi_state" class="error"></p></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <b>Pin Code</b><br/>
                            <input id="residence_pincode" type="text" 
                            value="<?php echo display($row,'residence_pincode');?>" name="residence_pincode">
                        </div>
                        <div class="col-sm-4">
                            <b>Contact No.</b><br/>
                            <input id="residence_contact_no" type="text" 
                            value="<?php echo display($row,'residence_contact_no');?>" name="residence_contact_no">
                        </div>
                        <div class="col-sm-4">
                            <b>Fax</b><br/>
                            <input id="residence_fax_no" type="text" 
                            value="<?php echo display($row,'residence_fax_no');?>" name="residence_fax_no">
                        </div>
                        <div class="col-sm-4"><p id="resi_pincode" class="error"></p></div>
                        <div class="col-sm-4"><p id="resi_contact" class="error"></p></div>
                        <div class="col-sm-4"><p id="resi_fax" class="error"></p></div>
                    </div>
                    <!-- Permanent Address --> 
                    <div class="row">
                        <div class="col-sm-4"><h4><strong>Permanent address</strong></h4></div>
                        <br/><br/><br/>
                        <div class="col-sm-4">
                            <b>Street</b><br/>
                            <input id="permanent_street" type="text" 
                            value="<?php echo display($row,'permanent_street');?>" name="permanent_street">
                        </div>
                        <div class="col-sm-4"><b>City</b><br/>
                            <input id="permanent_city" type="text" 
                            value="<?php echo display($row,'permanent_city');?>" name="permanent_city">
                        </div>
                        <div class="col-sm-4"><b>State</b><br/>
                            <input id="permanent_state" type="text" 
                            value="<?php echo display($row,'permanent_state');?>" name="permanent_state">
                        </div>
                        <div class="col-sm-4"><p id="perm_street" class="error"></p></div>
                        <div class="col-sm-4"><p id="perm_city" class="error"></p></div>
                        <div class="col-sm-4"><p id="perm_state" class="error"></p></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <b>Pin Code</b><br/>
                            <input id="permanent_pincode" type="text" 
                            value="<?php echo display($row,'permanent_pincode');?>" name="permanent_pincode">
                        </div>
                        <div class="col-sm-4">
                            <b>Contact No.</b><br/>
                            <input id="permanent_contact_no" type="text" 
                            value="<?php echo display($row,'permanent_contact_no');?>" name="permanent_contact_no">
                        </div>
                        <div class="col-sm-4">
                            <b>Fax</b><br/>
                            <input id="permanent_fax_no" type="text" 
                            value="<?php echo display($row,'permanent_fax_no');?>" name="permanent_fax_no">
                        </div>
                        <div class="col-sm-4"><p id="perm_pincode" class="error"></p></div>
                        <div class="col-sm-4"><p id="perm_contact" class="error"></p></div>
                        <div class="col-sm-4"><p id="perm_fax" class="error"></p></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <b>Write something</b><br/>
                        <textarea rows="7" name="comment"><?php echo stripcslashes($row['comment']);?></textarea>
                    </div> 
                    <br/>
                    <div class="col-sm-4"><input id="edit" type="submit" value="submit" name="submit" size="50"></div>
                    <div class="col-sm-4"><input id="" type="file" value="image" name="image"></div>
                    <div class="col-sm-4">
                        <img width = "150px" height="150px" src="img/<?php

                        if(!isset($_POST['submit']))
                        {
                            echo $row['image'];         
                        }   
                        else
                        {
                            echo $img_var;
                        }

                        ?>">
                    </div>
                    <div class="col-sm-4"><a href="reset_password.php"><h3>Reset Password</h3></a></div> 
                </div>
            </form> 
        </div>
    </div>
</div>
<?php require("footer.html");?>