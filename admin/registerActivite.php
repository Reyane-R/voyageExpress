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
        <h5 class="modal-title" id="exampleModalLabel">Ajouter une activité </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="registerActivite.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> name_activite </label>
                <input type="text" name="name_activite" class="form-control" placeholder="Enter name_activite">
            </div>
            <div class="form-group">
                <label>type_activite</label>
                 <select name="type_activite" class="form-control" placeholder="Entrez une activité">
                                                    <option value="musee">musée</option>
                                                    <option value="parc d attraction">parc d'attraction</option>
                                                    <option value="detente">détente</option>
                                                    <option value="bien-être">bien-être</option>
                                                    <option value="sport">sport</option>
                                                    <option value="reflexion">reflexion</option>
                                                    </select>
            </div>

            <div class="form-group">
                <label> adress_activite </label>
                <input type="text" name="adress_activite" class="form-control" placeholder="Enter adress_activite">
            </div>

            <div class="form-group">
                <label>city_activite</label>
                <input type="text" name="city_activite" class="form-control" placeholder="Enter city_activite">
            </div>

            <div class="form-group">
                <label> price_activite </label>
                <input type="text" name="price_activite" class="form-control" placeholder="Enter price_activite">
            </div>

        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="add_activite" class="btn btn-primary">Save</button>
        </div>
        <?php echo add_activite(); ?>
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
              Ajouter une activité
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">
      <?php 
      $query = "SELECT * FROM activite";
      echo display_table_query($query, 2);
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