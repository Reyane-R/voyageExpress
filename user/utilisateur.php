<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="container-fluid">
<form action="">
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
 <a href="#demo" data-toggle="collapse">Collapsible</a>

<div id="demo" class="collapse">
<div class="form-group">
  <label for="sel1">Select list:</label>
  <select multiple class="form-control" id="sel1">
    <option>France</option>
    <option>mali</option>
    <option>belgiue</option>
    <option>suisse</option>
    <option>nepal</option>
  </select>
</div> 
Lorem ipsum dolor text....
</div> 
  </div>
  <div class="card shadow mb-4">
  <div class="card-header py-3">
 <a href="#de" data-toggle="collapse">Collapsible</a>

<div id="de" class="collapse">
<form action="#">
    <p class="range-field">
      <input type="range" id="price-range" min="0" max="100" />
    </p>
  </form> 
Lorem ipsum dolor text....
</div> 
  </div>

  <div class="card shadow mb-4">
  <div class="card-header py-3">
 <a href="#dem" data-toggle="collapse">Collapsible</a>

<div id="dem" class="collapse">
<div class="form-group">
  <label for="sel2">Select list:</label>
  <select multiple class="form-control" id="sel2">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
  </select>
</div> 
Lorem ipsum dolor text....
</div> 
  </div>
  <div class="card shadow mb-4">
  <div class="card-header py-3">
  <form action="#">
    <p class="range-field">
      <input type="range" id="price-range" min="0" max="100" />
    </p>
  </form>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Username </th>
            <th>Email </th>
            <th>Password</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody id="myTable">
     
          <tr>
            <td> 2 </td>
            <td> roro</td>
            <td> lolo@example.com</td>
            <td> *** </td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="edit_id" value="">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="" method="post">
                  <input type="hidden" name="delete_id" value="">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>
          <tr>
            <td> 3 </td>
            <td> dqdqdq</td>
            <td> dqdqd@example.com</td>
            <td> *** </td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="edit_id" value="">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="" method="post">
                  <input type="hidden" name="delete_id" value="">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>
        
          <tr>
            <td> 1 </td>
            <td> Funda of WEb IT</td>
            <td> funda@example.com</td>
            <td> *** </td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="edit_id" value="">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="" method="post">
                  <input type="hidden" name="delete_id" value="">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>
        
        
        </tbody>
      </table>

    </div>
  </div>
</div>
</form>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>