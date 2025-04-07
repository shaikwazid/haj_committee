<?php
include('../include/session.php');
ini_set("display_errors","0");
?>
<style>
a{
  cursor: pointer;
}
</style>

<?php
if(isset($_REQUEST['addForm'])){


    if($_REQUEST['addForm'] == 2 && isset($_POST['editform'])){


    $data_sel = $database->query("SELECT * FROM griveance_callcenter WHERE id = '".$_POST['editform']."'");
    if($data_sel->rowcount() > 0){
    $data = $data_sel->fetch(PDO::FETCH_ASSOC);
   $_POST = array_merge($_POST,$data);
?>
 <script type="text/javascript">
 //$('#adminForm').slideDown();
 </script>
 <?php
    }
 }
 ?>
  
      <div class="container-fluid ">

        <div class="card border-0 shadow  mt-2">

            <div class="card-header text-center mb-5 pb-0 text-white" style="background-color: #e37a1f;">
                        <h5>KMC CALL CENTRE GRIEVANCES</h5>

            </div>

                  <div class="card-body px-5">
                    <form action="">
                    
                        <!-- first_row_Start -->
                    
                        <div class="row mb-4">
                            <div class="col-lg-4" style="display: none;">
                                <div class="mb-3" >
                                    <label for="formGroupExampleInput" class="form-label">SNo</label>
                                    <input type="text" class="form-control" id="sno" name="sno" placeholder="SNo" value="<?php if(isset($_POST['sno'])){ echo $_POST['sno'];}?>">
                                    <br><span class="text-danger"><?php if(isset($_SESSION['error']['sno'])){ echo $_SESSION['error']['sno'];}?></span>
                                </div>
                    
                            </div>
<?php
if(isset($_POST['complaint_id']) && $_POST['complaint_id']!=''){
        $_POST['complaint_id']=$_POST['complaint_id'];
    }else {
        $selcomp = $database->query("SELECT id,timestamp from griveance_callcenter");
        $rowcmpid = $selcomp->rowcount();
        $task_id = 'KMC03-2024-'.sprintf('%02d',$rowcmpid+1); 
        $_POST['complaint_id']=$task_id;
    }

?>


                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Complaint ID</label>
                                    <input type="text" class="form-control" id="complaint_id" name="complaint_id" placeholder="Complaint ID" readonly value="<?php if(isset($_POST['complaint_id'])){ echo $_POST['complaint_id'];}?>">
                                    <br><span class="text-danger"><?php if(isset($_SESSION['error']['complaint_id'])){ echo $_SESSION['error']['complaint_id'];}?></span>
                                </div>
                    
                    
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Date of Complaint</label>
                                    <input type="text" class="form-control" ondrop="return false" onpaste="return false" onkeydown="return false" onkeypress="return false" id="date_complaint" name="date_complaint" placeholder="Date of Complaint" value="<?php if(isset($_POST['date_complaint'])){ echo date('d-m-Y',strtotime($_POST['date_complaint']));}?>">
                                    <br><span class="text-danger"><?php if(isset($_SESSION['error']['date_complaint'])){ echo $_SESSION['error']['date_complaint'];}?></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label for="Source of Complaint" class="form-label">Source of Complaint</label>
                                <select class="form-select" aria-label="Default select example" id="source_complaint" name="source_complaint">
                                    <option value="" selected>Select a Source of Complaint</option>
                                    <option value="1" <?php if(isset($_POST['source_complaint']) && $_POST['source_complaint']=='1'){ ?>selected=selected<?php } ?>>Commissioner</option>
                                    <option value="2" <?php if(isset($_POST['source_complaint']) && $_POST['source_complaint']=='2'){ ?>selected=selected<?php } ?>>Call Center</option>
                                    <option value="3" <?php if(isset($_POST['source_complaint']) && $_POST['source_complaint']=='3'){ ?>selected=selected<?php } ?>>Adverse Media</option>
                                    <option value="4" <?php if(isset($_POST['source_complaint']) && $_POST['source_complaint']=='4'){ ?>selected=selected<?php } ?>>Offline</option>
                                    <option value="5" <?php if(isset($_POST['source_complaint']) && $_POST['source_complaint']=='5'){ ?>selected=selected<?php } ?>>Citizen App</option>
                                    <option value="6" <?php if(isset($_POST['source_complaint']) && $_POST['source_complaint']=='6'){ ?>selected=selected<?php } ?>>Website</option>
                                </select>
                                <br><span class="text-danger"><?php if(isset($_SESSION['error']['source_complaint'])){ echo $_SESSION['error']['source_complaint'];}?></span>
                            </div>
                        </div>

                        
                    
                        <!-- first_row_end -->
                        <!-- second_row_start -->
                        <div class="row mb-3">
                            <div class="col-lg-4">
                    
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Complainant Name</label>
                                    <input type="text" class="form-control" id="complaint_name" name="complaint_name" placeholder="Complainant Name" value="<?php if(isset($_POST['complaint_name'])){ echo $_POST['complaint_name'];}?>">
                                    <br><span class="text-danger"><?php if(isset($_SESSION['error']['complaint_name'])){ echo $_SESSION['error']['complaint_name'];}?></span>
                                </div>
                    
                            </div>
                            <div class="col-lg-4">
                    
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Complainant Phone Number</label>
                                    <input type="text" class="form-control" id="complaint_phone" minlength="10" maxlength="10" onkeypress="return isNumber(event)" name="complaint_phone" 
                                        placeholder="Complainant Phone Number" value="<?php if(isset($_POST['complaint_phone'])){ echo $_POST['complaint_phone'];}?>">
                                     <br><span class="text-danger"><?php if(isset($_SESSION['error']['complaint_phone'])){ echo $_SESSION['error']['complaint_phone'];}?></span>
                                </div>
                    
                            </div>
                            <div class="col-lg-4">
                    
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Address</label>
                                    <!-- <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="ADDRESS"> -->
                                    <textarea name="address" placeholder="Address" id="address" cols="33" rows="1" class="form-control"><?php if(isset($_POST['address'])){ echo $_POST['address'];}?></textarea>
                                    <br><span class="text-danger"><?php if(isset($_SESSION['error']['address'])){ echo $_SESSION['error']['address'];}?></span>
                                </div>
                    
                            </div>
                            
                        </div>
                        <!-- second_row_end -->
                        <!-- third_row_start -->
                        <div class="row mb-3">

                            <div class="col-lg-4">
                    
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Description</label>
                                    <!-- <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="ADDRESS"> -->
                                    <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php if(isset($_POST['description'])){ echo $_POST['description'];}?>">
                                    <br><span class="text-danger"><?php if(isset($_SESSION['error']['description'])){ echo $_SESSION['error']['description'];}?></span>
                                </div>
                    
                            </div>
                            




                            <div class="col-lg-4">
                                <label for="Source of Complaint" class="form-label">Sachivalayam Name</label>
                                <select class="form-select" aria-label="Default select example" id="sachivalayam_name">
                                    <option value="" selected>Select a Sachivalayam Name</option>

                                    <?php
                                    $selsach = $database->connection->prepare("select * from zone_sec_master order by sec_name ASC");
                                    $selsach->execute();
                                    while($rowsach = $selsach->fetch(PDO::FETCH_ASSOC))
                                    {
                                    ?>
                                    <option value="<?=$rowsach['sec_code']?>" <?php if(isset($_POST['sachivalayam_name']) && $_POST['sachivalayam_name']==$rowsach['sec_code']) { ?>selected=selected<?php } ?>><?=$rowsach['sec_name']?></option>
                                <?php } ?>
                                   
                                </select>
                                <br><span class="text-danger"><?php if(isset($_SESSION['error']['sachivalayam_name'])){ echo $_SESSION['error']['sachivalayam_name'];}?></span>
                            </div>


                            




                             <div class="col-lg-4">
                                <label for="Source of Complaint" class="form-label">Issue</label>
                                <select class="form-select" aria-label="Default select example" id="issue" name="issue" onchange="setState('department','<?php echo SECURE_PATH; ?>callcenter_form/process.php','getIssue=1&dept_id='+$('#issue').val())">
                                    <option value="" selected>Select a Issue</option>

                                    <?php 
                                    $selissue = $database->connection->prepare("select * from type_issues where status=1 order by type_issue ASC");
                                    $selissue->execute();
                                    while($rowissue = $selissue->fetch(PDO::FETCH_ASSOC))
                                    {
                                    ?>
                                    <option value="<?=$rowissue['id']?>" <?php if(isset($_POST['issue']) && $_POST['issue']==$rowissue['id']) { ?>selected=selected <?php } ?>><?=$rowissue['type_issue']?></option>
                                     <?php }  ?>   

                                </select>
                                <br><span class="text-danger"><?php if(isset($_SESSION['error']['issue'])){ echo $_SESSION['error']['issue'];}?></span>
                            </div>
                            
                    
                    
                            
                        </div>
                        <!-- third_row_end -->
                        <!-- fourth_row_start -->
                        <div class="row mb-3">

                           
                           <div class="col-lg-4">
                    
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Department</label>
                                     <select class="form-select" aria-label="Default select example" id="department" name="department" >
                                    <!-- <option value="" selected>Select a Department</option> -->
                                    <?php
                                    if(!empty($_POST['issue']))
                                    {

                                        $seliss = $database->connection->prepare("select * from type_issues where id=:dept_id");
                                        $dis = $_POST['issue'];
                                        $seliss->execute(array('dept_id' => $dis));
                                        $rowiss = $seliss->fetch(PDO::FETCH_ASSOC);


                                    $seldept = $database->connection->prepare("select * from type_department where status=1 and id='".$rowiss['department_id']."' order by department ASC");
                                    $seldept->execute();
                                    while($rowdept = $seldept->fetch(PDO::FETCH_ASSOC))
                                    {
                                    ?>
                                    <option value="<?=$rowdept['id']?>" <?php if(isset($_POST['department']) && $_POST['department']==$rowdept['id']) { ?>selected=selected<?php } ?>><?=$rowdept['department']?></option>
                                     <?php } }?>   

                                    </select>

                                    <br><span class="text-danger"><?php if(isset($_SESSION['error']['department'])){ echo $_SESSION['error']['department'];}?></span>
                    
                                </div>
                    
                            </div>



                            <div class="col-lg-4">
                    
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Concerned Officer</label>
                                    <input type="text" class="form-control" id="concerned_officer" placeholder="Concerned Officer" value="<?php if(isset($_POST['concerned_officer'])){ echo $_POST['concerned_officer'];}?>">
                                    <br><span class="text-danger"><?php if(isset($_SESSION['error']['concerned_officer'])){ echo $_SESSION['error']['concerned_officer'];}?></span>
                    
                                </div>
                    
                            </div>
                    
                    
                    
                            <div class="col-lg-4">
                    
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Zone</label>

                                    <select class="form-select" aria-label="Default select example" id="zone" name="zone">
                                    <option value="" selected>Select a Zone</option>
                                    <option value="1" <?php if(isset($_POST['zone']) && $_POST['zone']=='1') { ?>selected=selected <?php } ?>>East</option>
                                    <option value="2" <?php if(isset($_POST['zone']) && $_POST['zone']=='2') { ?>selected=selected <?php } ?>>West</option>
                                    <option value="3" <?php if(isset($_POST['zone']) && $_POST['zone']=='3') { ?>selected=selected <?php } ?>>South</option>
                                    <option value="4" <?php if(isset($_POST['zone']) && $_POST['zone']=='4') { ?>selected=selected <?php } ?>>North</option>
                                </select>
                    
                                <br><span class="text-danger"><?php if(isset($_SESSION['error']['zone'])){ echo $_SESSION['error']['zone'];}?></span>

                                </div>
                    
                            </div>




                            <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="col-sm-3 col-form-label">Upload</label>
                                <div class="col-sm-5" id="file-uploader13" style="display:inline">      
                                    <noscript>          
                                    <p>Please enable JavaScript to use file uploader.</p>
                                    <!-- or put a simple form for upload here -->
                                    </noscript>  
                                </div>
                                <script> 
                                    $(document).ready(function(){     
                                    function createUploader(){   
                                    var uploader = new qq.FileUploader({
                                    element: document.getElementById('file-uploader13'),
                                    action: '<?php echo SECURE_PATH;?>theme/upload/php6.php?upload=upload_image',
                                    debug: true,
                                    multiple:false
                                    });           
                                    }
                                    createUploader();
                                    });
                                </script>
                                <input type="hidden"  name="upload_image" id="upload_image" value="<?php if(isset($_POST['upload_image'])){ echo $_POST['upload_image'];}?>"  />
                                <div class="col-sm-2"></div>
                                <div class="col-sm-3">
                                    <div class="pics" id="pics">
                                        <?php   
                                        if(!empty($_POST['upload_image']))
                                        {
                                                ?>
                                                <a href="https://kmc.ap.gov.in/work_monitoring/data_files/".$_POST['upload_image'];?>" >View Document</a>

                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <span class="error"><?php if(isset($_SESSION['error']['upload_image'])){ echo $_SESSION['error']['upload_image'];}?></span>
                            </div>
                        </div>


                    
                    
                        </div>
                      
                    
                    
                        <div class="text-center">
                            <a style="cursor:pointer;" onClick="setState('adminForm','<?php echo SECURE_PATH;?>callcenter_form/process.php','validateForm=1&sno='+$('#sno').val()+'&complaint_id='+$('#complaint_id').val()+'&date_complaint='+$('#date_complaint').val()+'&source_complaint='+$('#source_complaint').val()+'&address='+$('#address').val()+'&description='+$('#description').val()+'&sachivalayam_name='+$('#sachivalayam_name').val()+'&issue='+$('#issue').val()+'&department='+$('#department').val()+'&concerned_officer='+$('#concerned_officer').val()+'&zone='+$('#zone').val()+'&complaint_name='+$('#complaint_name').val()+'&complaint_phone='+$('#complaint_phone').val()+'&upload_image='+$('#upload_image').val()+'&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?><?php if(isset($_POST['editform'])) { echo '&editform='.$_POST['editform']; } ?>')"> <input type="button" class="border-0 px-4 py-2  rounded-2 text-white" value="Submit" style="background-color: #43857c; "></a>

                        
                        </div>
                    
                    </form>
                  </div>

        </div>

    </div>





<?php
unset($_SESSION['error']);
}

// validateForm
if(isset($_REQUEST['validateForm']))
{
  $_REQUEST = $_POST = $post = $session->cleanInput($_REQUEST);
  $_SESSION['error'] = array();

  $post = $session->cleanInput($_POST);

    $id = 'NULL';
            if(isset($post['editform'])){
      $id = $post['editform'];

    }


  // if(!isset($post['sno']) || strlen($_REQUEST['sno']) == 0){
  //   $_SESSION['error']['sno']= "* Please enter SNo";
  // }
  if(!isset($post['complaint_id']) || strlen($_REQUEST['complaint_id']) == 0){
    $_SESSION['error']['complaint_id']= "* Please enter Complaint Id";
  }
  if(!isset($post['date_complaint']) || strlen($_REQUEST['date_complaint']) == 0){
    $_SESSION['error']['date_complaint']= "* Please enter Date of Complaint";
  }
  if(!isset($post['source_complaint']) || strlen($_REQUEST['source_complaint']) == 0){
    $_SESSION['error']['source_complaint']= "* Please enter Source of Complaint";
  }

  if(!isset($post['complaint_name']) || strlen($_REQUEST['complaint_name']) == 0){
    $_SESSION['error']['complaint_name']= "* Please enter Complaint Name";
  }

  if(!isset($post['complaint_phone']) || strlen($_REQUEST['complaint_phone']) == 0){
    $_SESSION['error']['complaint_phone']= "* Please enter Phone number";
  }
  if(!isset($post['address']) || strlen($_REQUEST['address']) == 0){
    $_SESSION['error']['address']= "* Please Enter Address";
  }
  if(!isset($post['description']) || strlen($_REQUEST['description']) == 0){
    $_SESSION['error']['description']= "* Please enter Description";
  }
  if(!isset($post['sachivalayam_name']) || strlen($_REQUEST['sachivalayam_name']) == 0){
    $_SESSION['error']['sachivalayam_name']= "* Please Select Sachivalayam Name";
  }
  if(!isset($post['issue']) || strlen($_REQUEST['issue']) == 0){
    $_SESSION['error']['issue']= "* Please enter Issue";
  }
  if(!isset($post['department']) || strlen($_REQUEST['department']) == 0){
    $_SESSION['error']['department']= "* Please Select Department";
  }
  if(!isset($post['concerned_officer']) || strlen($_REQUEST['concerned_officer']) == 0){
    $_SESSION['error']['concerned_officer']= "* Please select officer";
  }
  if(!isset($post['zone']) || strlen($_REQUEST['zone']) == 0){
    $_SESSION['error']['zone']= "* Please select zone";
  }


  
  if(count($_SESSION['error']) > 0){
    ?>
    <script>
    setState('adminForm','<?php echo SECURE_PATH ?>callcenter_form/process.php','addForm=1&sno=<?php echo $post['sno'] ?>&complaint_id=<?php echo $post['complaint_id'] ?>&date_complaint=<?php echo $post['date_complaint'] ?>&source_complaint=<?php echo $post['source_complaint'] ?>&address=<?php echo $post['address'] ?>&description=<?php echo $post['description'] ?>&sachivalayam_name=<?php echo $post['sachivalayam_name'] ?>&issue=<?php echo $post['issue'] ?>&department=<?php echo $post['department'] ?>&concerned_officer=<?php echo $post['concerned_officer'] ?>&zone=<?php echo $post['zone'] ?>&complaint_name=<?php echo $post['complaint_name'] ?>&complaint_phone=<?=$post['complaint_phone']?>&<?php if(isset($_POST['editform'])){ echo '&editform='.$post['editform'];}?>&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');
    </script>
    <?php
  }
  else
  {

    if($id=='NULL')
        {

    //$complaint_id = 'KMC03-2024-01';

           

    $ins=$database->connection->prepare("INSERT INTO griveance_callcenter VALUES (NULL,:sno, :complaint_id, :complaint_name, :date_complaint, :source_complaint, :complaint_phone, :address, :description, :sachivalayam_name, :issue, :department, :concerned_officer, :zone, :latitude, :longitude, :upload_image, :status, :isactive, :del_flag, :username, :timestamp)");
    $ins->execute(array(
'sno'=>$post['sno'], 
'complaint_id'=>$post['complaint_id'], 
'complaint_name'=>$post['complaint_name'],
'date_complaint'=>date('Y-m-d',strtotime($post['date_complaint'])), 
'source_complaint'=>$post['source_complaint'], 
'complaint_phone'=>$post['complaint_phone'], 
'address'=>$post['address'], 
'description'=>$post['description'], 
'sachivalayam_name'=>$post['sachivalayam_name'], 
'issue'=>$post['issue'], 
'department'=>$post['department'], 
'concerned_officer'=>$post['concerned_officer'], 
'zone'=>$post['zone'], 
'latitude'=>0,
'longitude'=>0,
'upload_image'=>$post['upload_image'],
'status'=>1, 
'isactive'=>1, 
'del_flag'=>1, 
'username'=>$session->username, 
'timestamp'=>time()
    ));

    ?>
    <script>
    swal("Data saved successfully");
    setState('adminForm','<?php echo SECURE_PATH ?>callcenter_form/process.php','addForm=1');
    </script>
    <?php

}
else
{
    $db = $database->connection->prepare("UPDATE griveance_callcenter SET complaint_name='".$post['complaint_name']."',date_complaint='".date('Y-m-d',strtotime($post['date_complaint']))."',source_complaint='".$post['source_complaint']."',complaint_phone='".$post['complaint_phone']."',address='".$post['address']."',description='".$post['description']."',sachivalayam_name='".$post['sachivalayam_name']."',issue='".$post['issue']."',department='".$post['department']."',concerned_officer='".$post['concerned_officer']."',zone='".$post['zone']."',upload_image='".$post['upload_image']."',del_flag=1,isactive=1,timestamp='".time()."' WHERE id='".$post['editform']."'");
    $db->execute();

    ?>
    <script>
    swal('','Data Updated successfully','success');
    setStateGet('adminTable','<?php echo SECURE_PATH ?>callcenter_report/process.php','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');
    </script>

    <?php
}

    ?>
    
    <?php

}

}


      if (isset($_REQUEST['getIssue'])) {
        $get = $post = $_POST = $_REQUEST = $session->cleanInput($_REQUEST);


        $seliss = $database->connection->prepare("select * from type_issues where id=:dept_id");
        $dis = $_REQUEST['dept_id'];
        $seliss->execute(array('dept_id' => $dis));
        $rowiss = $seliss->fetch(PDO::FETCH_ASSOC);

        $selissue = $database->connection->prepare("SELECT * FROM type_department where id = :dept_id order by department ASC");
        $selissue->execute(array('dept_id' => $rowiss['department_id']));
        ?>
       <option value="">Select</option>
       <?php
        while ($rowissue = $selissue->fetch(PDO::FETCH_ASSOC)) {
        ?>
         <option value="<?php echo $rowissue['id'] ?>" selected><?php echo $rowissue['department']; ?></option>
       <?php
        }
      }
 ?>
 <script>
     $( document ).ready(function() {
         $(".side-menu .nav-item").click(function(){
            $(".side-menu .nav-item").removeClass("active");
            $(this).addClass("active");
         });
         $(".sub-menu .subnav-item").click(function(){
            $(".sub-menu .subnav-item").removeClass("active");
            $(this).addClass("active");
         });
          $('#date_complaint').datetimepicker({
            "allowInputToggle": true,
            "showClose": false,
            "showClear": false,
            "showTodayButton": false,
            "format": "DD-MM-YYYY"
          });
          $('#techDate').datetimepicker({
            "allowInputToggle": true,
            "showClose": false,
            "showClear": false,
            "showTodayButton": false,
            "format": "DD-MM-YYYY"
          });
          $('#tenDate').datetimepicker({
            "allowInputToggle": true,
            "showClose": false,
            "showClear": false,
            "showTodayButton": false,
            "format": "DD-MM-YYYY"
          });
     });
 </script>