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
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un moyen de locomotion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="registerLocomotion.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> locomotion_name </label>
                <input type="text" name="locomotion_name" class="form-control" placeholder="Enter locomotion_name">
            </div>
            <div class="form-group">
                <label> type_locomotion </label>
                <select name="type_locomotion" class="form-control" placeholder="Entrez un type ">
                                                    <option value="prive">prive</option>
                                                    <option value="public">public</option>
                                                    </select>
            </div>

            <div class="form-group">
                <label> price_locomotion </label>
                <input type="text" name="price_locomotion" class="form-control" placeholder="Enter price_locomotion">
            </div>

            <div class="form-group">
                <label>horaire_locomotion</label>
                <input type="text" name="horaire_locomotion" class="form-control" placeholder="Enter horaire_locomotion">
            </div>

        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="add_locomotion" class="btn btn-primary">Save</button>
        </div>
        <?php echo add_locomotion(); ?>
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
              Ajouter un moyen de locomotion
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">
      <?php 
      $query = "SELECT * FROM locomotion";
      echo display_table_query($query, 6);
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