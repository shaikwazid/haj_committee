<?php
include('../include/session.php');
?>
<style>
a{
  cursor: pointer;
}
</style>
<?php
if(isset($_REQUEST['addForm'])){
  $con = "";
  if(isset($_REQUEST['zone']) && strlen($_REQUEST['zone']) > 0)
  {
    $con.=" and zone='".$_REQUEST['zone']."'";
  }
  if(isset($_REQUEST['division']) && strlen($_REQUEST['division']) > 0)
  {
    $con.=" and division='".$_REQUEST['division']."'";
  }
  if(isset($_REQUEST['secretariat']) && strlen($_REQUEST['secretariat']) > 0)
  {
    $arr = rtrim($_REQUEST['secretariat'],",");
    $con.=" and secretariat in(".$arr.")";
  }
?>
<section class="content-area">
    <div class="container-fluid">
        <div class="mini_card border-0 shadow-sm card-body mb-3">
            <div class="row">
                <div class="col-md-6 col-xxl-3 col-lg-3 col-sm-12">
                    <div class="mb-3">
                        <label for="zones" class="form-label">Zones</label>
                        <select class="form-select" aria-label="Default select example" id="zone" onchange="setState('adminForm','<?php echo SECURE_PATH; ?>contractors/process.php','addForm=1&zone='+$('#zone').val()+'&division='+$('#division').val()+'&secretariat='+$('#secretariat').val()+'')">
                            <option value="">All</option>
                            <?php
                            $data = $database->query("select * from zone");
                            while($row = $data->fetch(PDO::FETCH_ASSOC)){
                              ?>
                              <option value="<?php echo $row['id'] ?>" <?php if(isset($_REQUEST['zone'])){ if($_REQUEST['zone'] == $row['id']) { echo 'selected'; } } ?>><?php echo $row['zone']; ?></option>
                              <?php
                            }
                             ?>
                          </select>
                      </div>
                </div>
                <div class="col-md-6 col-xxl-3 col-lg-3 col-sm-12">
                    <div class="mb-3">
                        <label for="Divisions" class="form-label">Divisions</label>
                        <select class="form-select" id="division" onchange="setState('adminForm','<?php echo SECURE_PATH; ?>contractors/process.php','addForm=1&zone='+$('#zone').val()+'&division='+$('#division').val()+'&secretariat='+$('#secretariat').val()+'')">
                            <option value="">Select Divisions</option>
                            <?php
                              if(isset($_REQUEST['zone']) && strlen($_REQUEST['zone']) > 0){
                                $data = $database->connection->prepare("select * from divisions where zone_id=:id");

                                $data->execute(array('id'=>$_REQUEST['zone']));

                                while($row = $data->fetch(PDO::FETCH_ASSOC)){
                                  ?>
                                  <option value="<?php echo $row['id'] ?>" <?php if(isset($_REQUEST['division'])){ if($_REQUEST['division'] == $row['id']) { echo 'selected'; } } ?>><?php echo $row['division']; ?></option>
                                  <?php
                                }
                              }
                             ?>
                        </select>
                      </div>
                </div>
                <div class="col-  md-6 col-xxl-3 col-lg-3 col-sm-12">
<?php
$array = array();
if(isset($_REQUEST['secretariat'])){
  $array = explode(",",$_REQUEST['secretariat']);
}
 ?>
                    <div class="mb-3">
                        <label for="Secretariat " class="form-label">Secretariat </label>
                        <select class="form-control" id="secretariat" multiple="multiple" onchange="setState('adminForm','<?php echo SECURE_PATH; ?>contractors/process.php','addForm=1&zone='+$('#zone').val()+'&division='+$('#division').val()+'&secretariat='+$('#secretariat').val()+'')">
                            <option value="">None Selected</option>
                            <?php
                              if(isset($_REQUEST['division']) && strlen($_REQUEST['division']) > 0){
                                $data = $database->connection->prepare("select * from zone_sec_master where division=:id");

                                $data->execute(array('id'=>$_REQUEST['division']));

                                while($row = $data->fetch(PDO::FETCH_ASSOC)){

                                  ?>
                                  <option value="<?php echo $row['sec_code'] ?>" <?php if(isset($_REQUEST['secretariat'])){ if(in_array($row['sec_code'],$array)) { echo 'selected'; } } ?>><?php echo $row['sec_name']; ?></option>
                                  <?php
                                }
                              }
                             ?>
                        </select>
                      </div>
                </div>
                <!--<div class="col-md-6 col-xxl-3 col-lg-3 col-sm-12 pt-1">
                    <a class="theme-btn mb-3 mt-4">
                        Search
                    </a>
                </div>-->
            </div>
            </div>

            <div class="table-responsive">
                <table class="table drug-table bg-white">
                    <thead>
                        <tr class="drug-report">
                          <th>Sno</th>
                            <th>Contractor Name</th>
                            <th>PAN</th>
                            <th>POC Name</th>
                            <th>POC Mobile</th>
                            <th>Works Assigned</th>
                            <th>Works Completed</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i = 0;
$data = $database->query("select count(a.id) as total,coalesce(sum(if(status=1,1,0)),0) as completed,b.* from works a,work_loa_details b where a.del_flag=1 and a.id=b.uid ".$con." group by b.pan_no ");
while($row = $data->fetch(PDO::FETCH_ASSOC)) {
  $i++;
?>
                        <tr>
                          <td><?php echo $i; ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['pan_no'] ?></td>
                            <td><?php echo $row['poc_name'] ?></td>
                            <td><?php echo $row['mobile'] ?></td>
                            <td><?php echo $row['total'] ?></td>
                            <td><?php echo $row['completed'] ?></td>
                        </tr>
<?php
}
?>

                    </tbody>
                </table>
            </div>
                            </div>
                        </div>
        </div>

    </div>
</section>
  <?php
}

// validateForm
if(isset($_REQUEST['validateForm'])){
  $_REQUEST = $_POST = $post = $session->cleanInput($_REQUEST);
$_SESSION['error'] = array();
if(!isset($post['fund_type']) || strlen($_REQUEST['fund_type']) == 0){
  $_SESSION['error']['fund_type']= "* Please enter Fund name";
}
if(!isset($post['amount']) || strlen($_REQUEST['amount']) == 0){
  $_SESSION['error']['amount']= "* Please enter Amount";
}
if(count($_SESSION['error']) > 0){
  ?>
  <script>
  setState('adminForm','<?php echo SECURE_PATH ?>funds/process.php','addForm=1&fund_type=<?php echo $post['fund_type'] ?>&amount=<?php echo $post['amount'] ?><?php if(isset($_REQUEST['editform'])) { echo "&editform=".$_REQUEST['editform']; } ?>');
  </script>
  <?php
} else{

$id = NULL;

if(isset($post['editform'])) $id = $post['editform'];

if($id == NULL){
  $ins = $database->connection->prepare("insert into fund_types values(null,:fund_type,:amount,'".$session->username."',1,'".time()."')");

  $ins->execute(array('fund_type'=>$post['fund_type'],'amount'=>$post['amount']));
} else{

$update = $database->connection->prepare("update fund_types set fund_type=:fund_type,amount=:amount where id=:id");

$update->execute(array('fund_type'=>$post['fund_type'],'amount'=>$post['amount'],'id'=>$id));

}
?>
<script>
alert("Data saved successfully");
setState('adminForm','<?php echo SECURE_PATH ?>/funds/process.php','addForm=1');
</script>
<?php
}

}


// delete category
if(isset($_REQUEST['deleteData'])){

$del = $database->connection->prepare("update fund_types set del_flag=0 where id=:id");

$del->execute(array('id'=>$_REQUEST['id']));

  ?>
  <script>
  alert("Data deleted successfully");
  setState('adminForm','<?php echo SECURE_PATH ?>/funds/process.php','addForm=1');
  </script>
  <?php
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
         $('#secretariat').multiselect(
         {
             maxHeight: 220,
             buttonWidth: '100%',
             includeSelectAllOption: true,
             numberDisplayed: 1,
             disableIfEmpty: true,
             enableFiltering: true,
             enableCaseInsensitiveFiltering: true,
         });
     });
 </script>
