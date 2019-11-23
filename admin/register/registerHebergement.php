<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('../../fonctions.php');
include('../../include.php');
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Hebergement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="registerHebergement.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> hebergement_name </label>
                <input type="text" name="hebergement_name" class="form-control" placeholder="Enter hebergement_name">
            </div>
            <div class="form-group">
                <label>type_hebergement</label>
                <input type="text" name="type_hebergement" class="form-control" placeholder="Enter type_hebergement">
            </div>
            <div class="form-group">
                <label> city_hebergement </label>
                <input type="text" name="city_hebergement" class="form-control" placeholder="Enter city_hebergement">
            </div>
            <div class="form-group">
                <label>adress_hebergement</label>
                <input type="text" name="adress_hebergement" class="form-control" placeholder="Enter adress_hebergement">
            </div>
            <div class="form-group">
                <label> average_price </label>
                <input type="text" name="average_price" class="form-control" placeholder="Enter average_price">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="add_hebergement" class="btn btn-primary">Save</button>
        </div>

        <?php 
        echo add_hebergement();


        $query = 'SELECT type_hebergement FROM hebergement';


        echo display_table_query($query); ?>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Activite
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Activite
            </button>
    </h6>
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
        <tbody>
     
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

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>