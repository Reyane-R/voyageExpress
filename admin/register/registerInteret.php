<?php 
include('../../includes/header.php'); 
include('../../includes/navbar.php'); 
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
      <form action="registerInteret.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> name_interet </label>
                <input type="text" name="name_interet" class="form-control" placeholder="Enter name_interet">
            </div>
            <div class="form-group">
                <label>type_interet</label>
                <select name="type_interet" class="form-control" placeholder="Entrez un type ">
                                                    <option value="police">police</option>
                                                    <option value="hopital">hopital</option>
                                                    <option value="gendarmerie">gendarmerie</option>
                                                    <option value="banque">banque</option>
                                                    <option value="station service">station service</option>
                                                    <option value="centre commercial">centre commmercial</option>
                                                    </select>
            </div>
            <div class="form-group">
                <label> telephone </label>
                <input type="text" name="telephone" class="form-control" placeholder="Enter telephone">
            </div>
            <div class="form-group">
                <label>adress_interet</label>
                <input type="text" name="adress_interet" class="form-control" placeholder="Enter adress_interet">
            </div>
            <div class="form-group">
                <label>time_open</label>
                <input type="text" name="time_open" class="form-control" placeholder="Enter time_open">
            </div>
            <div class="form-group">
                <label> city_interet </label>
                <input type="text" name="city_interet" class="form-control" placeholder="Enter city_interet">
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="add_interet" class="btn btn-primary">Save</button>
        </div>

        <?php 
        echo add_interet();

        $query = "SELECT * FROM point_interet ";

        echo display_table_query($query);
         ?>
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
