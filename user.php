<?php 
include 'header.php';
include ("connection.php");
// ----------------Insent Record Start
if(isset($_POST["save"])){
    @$TxtVal1=strtoupper($_POST["Val1"]);
    @$TxtVal2=$_POST["Val2"];
    @$TxtVal3=strtoupper($_POST["Val3"]);
    if($TxtVal1 == "" || $TxtVal2 == "" || $TxtVal3 == ""){ ?> <script>alert("Please insert proper record!"); </script> <?php }
    else { mysqli_query($con,"INSERT INTO user(user_name, password, role) VALUES ('$TxtVal1', '$TxtVal2', '$TxtVal3')");
?>
<script>
        alert("Rocord has been Inserted"); 
        window.location = 'user.php';
</script>
<?php } } 
// <!-- ----------------Insent Record End -->
// <!-- ----------------Refresh Record Start -->
if(isset($_POST["cancel"])){
?>
<script>
        //alert("Rocord has been Inserted"); 
        window.location = 'user.php';
</script>
<?php } ?>
// <!-- ----------------Refresh Record End -->
<?php
// <!-- -----------------------Edit-------------- -->

  //$TxtVal1, $TxtVal2, $TxtVal3="";
if(isset($_GET["editID"]))
{
  $id=$_GET["editID"];
  $query=mysqli_query($con,"select * from user where id = '$id'");
  if($row=mysqli_fetch_array($query))
  {
    $UptVal1=$row[1];
    $UptVal2=$row[2];
    $UptVal3=$row[3];
  }
}
// <!-- -----------------------Edit-------------- -->
// <!-- -------------------Update--------------------- -->

if(isset($_POST["update"])){
    @$TxtVal1=strtoupper($_POST["Val1"]);
    @$TxtVal2=$_POST["Val2"];
    @$TxtVal3=strtoupper($_POST["Val3"]);
    if($TxtVal1 == "" || $TxtVal2 == "" || $TxtVal3 == ""){ ?> <script>alert("Please insert proper record!"); </script> <?php }
    else { mysqli_query($con,"UPDATE user SET user_name='$TxtVal1', password='$TxtVal2', role='$TxtVal3' WHERE id='$id'");
?>
<script>
        alert("Rocord has been Updated"); 
        window.location = 'user.php';
</script>
<?php
} }
// <!-- -------------------Update--------------------- -->
// <!-- //****************** DELETE RECORD ********************* -->

if(isset($_GET["DeleteID"]))
{
    $DelId=$_GET["DeleteID"];
    mysqli_query($con,"delete from user where id = '$DelId'");
?>
<script>
      alert("Rocord has been Deleted"); 
      window.location = 'user.php';   
</script>
<?php
}
?>
<!-- //****************** DELETE RECORD ********************* -->



<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Form</h1>
          </div>
          <div class="col-sm-6">
     
          </div>
        </div>
      </div>
    </section>


    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header" style="background-color: #343a40;">
                <h3 class="card-title">User Information</h3>
              </div>
              <form method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">User Name</label>
                    <input type="text" class="form-control" placeholder="Enter User Name" name="Val1" value="<?php echo @$UptVal1 ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="Val2" value="<?php echo @$UptVal2 ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Role</label>
                    <input type="text" class="form-control" placeholder="Roll" name="Val3" value="<?php echo @$UptVal3 ?>">
                  </div>
                  <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label"></label>
                  </div> -->
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-default" name="cancel">Cancel</button>
                  <button type="submit" class="btn btn-default float-right" name="update">Update</button>
                  <button type="submit" class="btn btn-default float-right" name="save">Save Now</button>
                </div>
              </form>
            </div>
          </div>





          <div class="col-md-8">
            <div class="card card-warning">
              <div class="card-header" style="background-color: #343a40; color: white;">
                <h3 class="card-title">All Users</h3>
              </div>
              <div class="card-body">
         <!-- ---------------------------     	table area -->
         		<div class="card">
              <div class="card-header">
                <h3 class="card-title">All Recors</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>User Name</th>
                    <th>Role</th>
                    <th>Registered Date</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
<?php 
$query=mysqli_query($con,"SELECT * FROM user order by id ASC");
while($fet=mysqli_fetch_array($query)){                                      
echo " 
                  <tr>
                    <td>$fet[1]</td>
                    <td>$fet[3]</td>
                    <td>$fet[4]</td>
                    <td>
                      <a href='user.php?editID=$fet[0]'>Edit</a> | <a href='user.php?DeleteID=$fet[0]'>Delete</a>
                    </td>
                  </tr>
" ;} ?> 
                </table>
              </div>
              <!-- /.card-body -->
            </div>

         <!-- ---------------------------     	table area -->
              </div>
            </div>
          </div> 


          </div>
        </div>
      </div>
    </section>
  </div>

 <?php include 'footer.php';?>