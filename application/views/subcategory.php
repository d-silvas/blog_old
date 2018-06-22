<main data-subcat-id="<?= $subcat_id ?>" role="main" class="container">
  <div class="jumbotron" style="background-image: url(../../../assets/images/<?= $subcategory->img ?>); height: 350px; width: 100%;">
    <h1 class="text-white"><?= $subcategory->name ?></h1>
    <p class="lead text-white"><?= $subcategory->description ?></p>
  </div>
  <div class="row">
    <div class="col">
      <table id="posts-table" class="compact display">
        <thead>
          <tr>
            <th> Post number </th>
            <th> Title </th>
            <th> Date </th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
</main>
