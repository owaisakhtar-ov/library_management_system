<?php
include 'header.php';
include ("connection.php");

if(isset($_GET["ReturnID"]))
{
    $ReturnID=$_GET["ReturnID"];
    $BookID=$_GET["BookID"];
    $TxtVal2="";
    mysqli_query($con,"UPDATE book_issue_detail SET status='RETURN' where id='$ReturnID'");
    $query=mysqli_query($con,"SELECT * FROM book where id='$BookID'");
    while($fet=mysqli_fetch_array($query))
    {
        $TxtVal2=$fet[4];
    }
    $TxtVal3 = ($TxtVal2 + 1);
    mysqli_query($con,"UPDATE book SET quantity='$TxtVal3' where id='$BookID'");
?>
<script>
        alert("Rocord has been Updated"); 
        window.location = 'bookReturn.php';
</script>
<?php
}
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Book Return Form</h1>
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
                <h3 class="card-title">Book Return Information</h3>
              </div>
              <form method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Issue ID</label>
                    <select class="form-control" name="Val1">
                    <option selected disabled>Select Any One</option>
                        <?php 
                        $query=mysqli_query($con,"SELECT * FROM book_issue_header");
                        while($fet=mysqli_fetch_array($query)){                                        
                        echo "<option value='$fet[0]' title='Issue Date => $fet[4]  | Required Date => $fet[3] '>$fet[2] | Student ID - $fet[1]</option>";} ?>
                    </select>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-default" name="cancel">Cancel</button>
                  <button type="submit" class="btn btn-default float-right" name="show">Show Now</button>
                </div>
              </form>
            </div>
          </div>





          <div class="col-md-8">
            <div class="card card-warning">
              <div class="card-header" style="background-color: #343a40; color: white;">
                <h3 class="card-title">All Return Book</h3>
              </div>
              <div class="card-body">
         <!-- ---------------------------     	table area -->
         		<div class="card">
              <div class="card-header">
                <h3 class="card-title">All Return Book Records</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Book Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
<?php
if(isset($_POST["show"])){
@$TxtVal1=strtoupper($_POST["Val1"]);
$query=mysqli_query($con,"SELECT * FROM book_issue_detail where issue_id = '$TxtVal1' and status = 'ISSUE'");
while($fet=mysqli_fetch_array($query)){                                      
echo " 
                  <tr>
                    <td>$fet[2]</td>
                    <td>$fet[3]</td>
                    <td>
                      <a href='bookreturn.php?ReturnID=$fet[0] & BookID=$fet[2]'>Return</a>
                    </td>
                  </tr>
" ;} }?> 
                </table>
              </div>
              <!-- /.card-body -->
            </div>

         <!-- ---------------------------     	table area -->
              </div>
              <div class="card-footer">
<!--                   <button class="btn btn-default" name="clear" type="submit">Clear All</button></form>
                  <button type="submit" class="btn btn-default float-right" data-toggle="modal" data-target="#myModal">Print Slip</button> -->
              </div>
            </div>
          </div> 


          </div>
        </div>
      </div>
    </section>
  </div>



  <form method="POST">
 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">X</button>
          <!-- <h4 class="modal-title">Modal Header</h4> -->
        </div>
        <div class="modal-body">
                          <div class="form-group">
                    <label for="exampleInputEmail1">Select Student</label>
                    <select class="form-control" name="Val2">
                    <option selected disabled>Select Any One</option>
                        <?php 
                        $query=mysqli_query($con,"SELECT * FROM student where status='ACTIVE' ");
                        while($fet=mysqli_fetch_array($query)){                                        
                        echo "<option value='$fet[0]' title='Student ID => $fet[1]  | Course => $fet[3] '>$fet[2]</option>";} ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Return Till</label>
                    <input type="date" class="form-control" placeholder="Student Name" name="Val3">
                  </div>
        </div>
        <div class="card-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-default float-right" name="print">Print Now</button>
        </div>
      </div>
      
    </div>
  </div>
  </form>

 <?php include 'footer.php';?>