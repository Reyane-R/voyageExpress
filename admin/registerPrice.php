<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('../fonctions.php');
include('../include.php');
?>



<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un prix </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="registerUtilisateur.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> login </label>
                <input type="text" name="login" class="form-control" placeholder="Enter login">
            </div>
            <div class="form-group">
                <label> password </label>
                <input type="text" name="password" class="form-control" placeholder="Enter password">
            </div>

            <div class="form-group">
                <label> type_account </label>
               <select name="type_account" class="form-control" placeholder="Entrez un type ">
                                                    <option value="utilisateur">utilisateur</option>
                                                    <option value="administrateur">administrateur</option>
                                                    </select>
            </div>

            <div class="form-group">
                <label> email </label>
                <input type="text" name="email" class="form-control" placeholder="Enter email">
            </div>

        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="add_utilisateur" class="btn btn-primary">Save</button>
        </div>
        <?php echo add_utilisateur(); ?>
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
              Ajouter un prix
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">
      <?php
      $query = "SELECT * FROM price";
      echo display_table_query($query, 5);
      ?>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>