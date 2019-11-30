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
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un pays </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="registerPays.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> country_name </label>
                <input type="text" name="country_name" class="form-control" placeholder="Enter country_name">
            </div>
            <div class="form-group">
                <label>time_fly</label>
                <input type="text" name="time_fly" class="form-control" placeholder="Enter time_fly au format HH:MM:SS">
            </div>

            <div class="form-group">
                <label> average_price </label>
                <input type="text" name="average_price" class="form-control" placeholder="Enter average_price">
            </div>

            <div class="form-group">
                <label>visa_required</label>
                <select name="visa_required" class="form-control" placeholder="">
                                                    <option value="true">oui</option>
                                                    <option value="false">non</option>
                                                    </select>
            </div>

            <div class="form-group">
                <label> vaccin_required </label>
                <select name="vaccin_required" class="form-control" placeholder="">
                                                    <option value="true">oui</option>
                                                    <option value="false">non</option>
                                                    </select>
            </div>

        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="add_country" class="btn btn-primary">Save</button>
        </div>
        <?php echo add_country(); ?>
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
              Ajouter un Pays
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <?php
      $query = "SELECT * FROM pays";
      echo display_table_query($query, 7);
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