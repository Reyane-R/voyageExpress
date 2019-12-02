<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="container-fluid">
<form action="">
<!-- DataTales Example -->

  <div class="card shadow mb-4">
  <div class="card-header py-3">
 <a href="#dem" data-toggle="collapse">Collapsible</a>

<div id="dem" class="collapse">
<p class="range-field">
    <label for="price-range">Votre budget :</label>
      <input type="range" id="price-range" min="0" max="1000000" />
    </p> 
<div class="form-group">
  <label for="sel2">Choisir Votre Destination:</label>
  <select  class="form-control" id="sel2">
    <option>France</option>
    <option>Belgique</option>
    <option>Suisse</option>
    <option>Russie</option>
    <option>Allemagne</option>
    <option>Angleterre</option>
    <option>Croatie</option>
  </select>
</div>
<div class="form-group">
  <label for="sel2">Categories:</label>
  <select multiple class="form-control" id="sel2">
    <option>Meteo</option>
    <option>Locomotion</option>
    <option>Nom de la ville</option>
    <option>Hebergement</option>
    <option>Activite</option>
    <option>Point d'interet</option>
    <option>Point d'interet</option>
  </select>
</div>
</div> 
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> city_name </th>
            <th>name_activite </th>
            <th> type_activite </th>
            <th>adress_activite </th>
            <th>Reserver</th>
          </tr>
        </thead>
        <tbody id="myTable">
     
          <tr>
            <td> Paris </td>
            <th>Disneyland Paris</th>
            <td> parc d attraction</td>
            <td> Boulevard de Parc, 77700 Coupvray</td>
            <td>
              <form action="">
              <input type="checkbox">
              </form>
            </td>
          </tr>
          <tr>
            <td> Paris</td>
            <th>Musée d Orsay</th>
            <td> musee</td>
            <td> 1 Rue de la Légion d Honneur, 75007 Paris</td>
            <td>
              <form action="">
              <input type="checkbox">
              </form>
            </td>
          </tr>
          <tr>
            <td> Paris </td>
            <th>Parc des princes</th>
            <td>sport</td>
            <td>24 Rue du Commandant Guilbaud, 75016 Paris</td>
            <td>
              <form action="">
              <input type="checkbox">
              </form>
            </td>
          </tr>
          <tr>
            <td> Paris </td>
            <th>Spa Villa Thalgo</th>
            <td>detente</td>
            <td> 8 Avenue Raymond Poincaré, 75016 Paris</td>
            <td>
              <form action="">
              <input type="checkbox">
              </form>
            </td>
          </tr>

        
        
        </tbody>
      </table>
      <input type="hidden" name="rever_id" value="">
       <button  type="submit" name="rever_btn" class="btn btn-success"> RESERVER</button>
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