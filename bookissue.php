<?php
include 'header.php';
include ("connection.php");
@$InvId="";
$C_ID=mysqli_query($con,"SELECT MAX(id) FROM book_issue_header");
while($fet=mysqli_fetch_array($C_ID)){ $InvId = $fet[0];} 
@$PreId = $InvId + 1;


// ----------------Insent Record Start
if(isset($_POST["save"])){
    @$TxtVal1=strtoupper($_POST["Val1"]);
    @$TxtVal2="";
    @$TxtVal3="";
    $query=mysqli_query($con,"SELECT * FROM book where id='$TxtVal1'");
    while($fet=mysqli_fetch_array($query))
    {
        $TxtVal2=$fet[1];
        $TxtVal3=$fet[4];
    }
    mysqli_query($con,"INSERT INTO book_issue_detail(issue_id, book_id, book_name, status) VALUES ('$PreId', '$TxtVal1', '$TxtVal2', 'ISSUE')");
    $UpdQty = ($TxtVal3 - 1);
    mysqli_query($con,"UPDATE book SET quantity='$UpdQty' WHERE  id='$TxtVal1'");
?>
<script>
        window.location = 'bookissue.php';
</script>
<?php
}

if(isset($_POST["print"])){
  $TxtVal4=strtoupper($_POST["Val2"]);
  $TxtVal5=strtoupper($_POST["Val3"]);
  $TxtVal6="";
  $query=mysqli_query($con,"SELECT * FROM student where id='$TxtVal4'");
    while($fet=mysqli_fetch_array($query))
    {
        $TxtVal6=$fet[2];
    }
  mysqli_query($con,"INSERT INTO book_issue_header(std_id, std_name, till_date) VALUES ('$TxtVal4', '$TxtVal6', '$TxtVal5')");
  ?>
    <script>
        alert("Rocord has been Inserted"); 
        window.location = 'bookissue.php';
    </script>
    <?php
    }

if(isset($_POST["clear"]))
{
     mysqli_query($con,"DELETE FROM book_issue_detail WHERE issue_id = '$PreInvNo'");
      ?>
    <script>
        alert("Record has been Cleared"); 
        window.location = 'bookissue.php';
    </script>
    <?php
}


?>
<!-- //****************** DELETE RECORD ********************* -->

// <!-- //****************** DELETE RECORD ********************* -->
<?php
if(isset($_GET["DeleteID"]))
{
    $DelId=$_GET["DeleteID"];
    mysqli_query($con,"delete from book_issue_detail where id = '$DelId' and issue_id ='$PreId'");
?>
<script>
        //alert("Rocord has been Deleted"); 
        window.location = 'bookissue.php';
</script>
<?php
}
?>
<!-- //****************** DELETE RECORD ********************* -->
<!-- //****************** DELETE RECORD ********************* -->



<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Book Issue Form</h1>
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
                <h3 class="card-title">Book Issue Information</h3>
              </div>
              <form method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Book</label>
                    <select class="form-control" name="Val1">
                    <option selected disabled>Select Any One</option>
                        <?php 
                        $query=mysqli_query($con,"SELECT * FROM book where quantity <> 0");
                        while($fet=mysqli_fetch_array($query)){                                        
                        echo "<option value='$fet[0]' title='Author Name => $fet[2]  | Edition => $fet[3] '>$fet[1] | Quantity - $fet[4]</option>";} ?>
                    </select>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-default" name="cancel">Cancel</button>
               <!--    <button type="submit" class="btn btn-default float-right" name="update">Update</button> -->
                  <button type="submit" class="btn btn-default float-right" name="save">Save Now</button>
                </div>
              </form>
            </div>
          </div>





          <div class="col-md-8">
            <div class="card card-warning">
              <div class="card-header" style="background-color: #343a40; color: white;">
                <h3 class="card-title">All Issue Book</h3>
              </div>
              <div class="card-body">
         <!-- ---------------------------     	table area -->
         		<div class="card">
              <div class="card-header">
                <h3 class="card-title">All Issue Book Records</h3>
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
$query=mysqli_query($con,"SELECT * FROM book_issue_detail where issue_id = '$PreId'");
while($fet=mysqli_fetch_array($query)){                                      
echo " 
                  <tr>
                    <td>$fet[3]</td>
                    <td>
                      <a href='bookissue.php?DeleteID=$fet[0]'>Delete</a>
                    </td>
                  </tr>
" ;} ?> 
                </table>
              </div>
              <!-- /.card-body -->
            </div>

         <!-- ---------------------------     	table area -->
              </div>
              <div class="card-footer">
                  <button class="btn btn-default" name="clear" type="submit">Clear All</button></form>
                  <button type="submit" class="btn btn-default float-right" data-toggle="modal" data-target="#myModal">Print Slip</button>
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
                    <label for="exampleInputEmail1">Issue Till</label>
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