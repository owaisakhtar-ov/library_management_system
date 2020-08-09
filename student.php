<?php 
include 'header.php';
include ("connection.php");
// ----------------Insent Record Start
if(isset($_POST["save"])){
    @$TxtVal1=$_POST["Val1"];
    @$TxtVal2=strtoupper($_POST["Val2"]);
    @$TxtVal3=strtoupper($_POST["Val3"]);
    @$TxtVal4=strtoupper($_POST["Val4"]);
    @$TxtVal5=strtoupper($_POST["Val5"]);
    if($TxtVal1 == "" || $TxtVal2 == "" || $TxtVal3 == "" || $TxtVal4 == "" || $TxtVal5 == ""){ ?> <script>alert("Please insert proper record!"); </script> <?php }
    else { mysqli_query($con,"INSERT INTO student(std_id, std_name, cource, address, status) VALUES ('$TxtVal1', '$TxtVal2', '$TxtVal3', '$TxtVal4', '$TxtVal5')");
?>
<script>
        alert("Rocord has been Inserted"); 
        window.location = 'student.php';
</script>
<?php } } 
// <!-- ----------------Insent Record End -->
// <!-- ----------------Refresh Record Start -->
if(isset($_POST["cancel"])){
?>
<script>
        //alert("Rocord has been Inserted"); 
        window.location = 'student.php';
</script>
<?php } ?>
// <!-- ----------------Refresh Record End -->
<?php
// <!-- -----------------------Edit-------------- -->

  //$TxtVal1, $TxtVal2, $TxtVal3="";
if(isset($_GET["editID"]))
{
  $id=$_GET["editID"];
  $query=mysqli_query($con,"select * from student where id = '$id'");
  if($row=mysqli_fetch_array($query))
  {
    $UptVal1=$row[1];
    $UptVal2=$row[2];
    $UptVal3=$row[3];
    $UptVal4=$row[4];
    $UptVal5=$row[5];
  }
}
// <!-- -----------------------Edit-------------- -->
// <!-- -------------------Update--------------------- -->

if(isset($_POST["update"])){
    @$TxtVal1=$_POST["Val1"];
    @$TxtVal2=strtoupper($_POST["Val2"]);
    @$TxtVal3=strtoupper($_POST["Val3"]);
    @$TxtVal4=strtoupper($_POST["Val4"]);
    @$TxtVal5=strtoupper($_POST["Val5"]);
    if($TxtVal1 == "" || $TxtVal2 == "" || $TxtVal3 == "" || $TxtVal4 == "" || $TxtVal5 == ""){ ?> <script>alert("Please insert proper record!"); </script> <?php }
    else { mysqli_query($con,"UPDATE student SET std_id='$TxtVal1', std_name='$TxtVal2', cource='$TxtVal3', address='$TxtVal4', status='$TxtVal5' WHERE id='$id'");
?>
<script>
        alert("Rocord has been Updated"); 
        window.location = 'student.php';
</script>
<?php
} }
// <!-- -------------------Update--------------------- -->
// <!-- //****************** DELETE RECORD ********************* -->

if(isset($_GET["DeleteID"]))
{
    $DelId=$_GET["DeleteID"];
    mysqli_query($con,"delete from student where id = '$DelId'");
?>
<script>
      alert("Rocord has been Deleted"); 
      window.location = 'student.php';   
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
            <h1>Student Form</h1>
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
                <h3 class="card-title">Student Information</h3>
              </div>
              <form method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Student ID</label>
                    <input type="text" class="form-control" placeholder="Student ID" name="Val1" value="<?php echo @$UptVal1 ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Student Name</label>
                    <input type="text" class="form-control" placeholder="Student Name" name="Val2" value="<?php echo @$UptVal2 ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Course</label>
                    <input type="text" class="form-control" placeholder="Course" name="Val3" value="<?php echo @$UptVal3 ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Student Address</label>
                    <textarea class="form-control" placeholder="Address" name="Val4"><?php echo @$UptVal4 ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Student Status</label>
                    <select class="form-control" name="Val5">
                      <option selected><?php echo @$UptVal5 ?></option>
                      <option>Active</option>
                      <option>InActive</option>
                      <option>Black List</option>
                    </select>
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
                <h3 class="card-title">All Student</h3>
              </div>
              <div class="card-body">
         <!-- ---------------------------     	table area -->
         		<div class="card">
              <div class="card-header">
                <h3 class="card-title">All Student Records</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Course</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
<?php 
$query=mysqli_query($con,"SELECT * FROM student order by id Desc");
while($fet=mysqli_fetch_array($query)){                                      
echo " 
                  <tr>
                    <td>$fet[1]</td>
                    <td>$fet[2]</td>
                    <td>$fet[3]</td>
                    <td>$fet[5]</td>
                    <td>
                      <a href='student.php?editID=$fet[0]'>Edit</a> | <a href='student.php?DeleteID=$fet[0]'>Delete</a>
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