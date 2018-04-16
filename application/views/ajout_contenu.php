 <div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <section>
      	<h4 style="text-align: center;">Ajout de contenu</h4>
          <b style="color:#ff0000;" id="msg"></b><br/>
       <label id="cat_l">Choisir une catégorie : </label>
       <fieldset>
       	<select name="cate" id="cat" class="form-control">
       		<option value="none" selected="selected" >Choisissez une catégorie</option>
       		<?php foreach($categories as $categorie): ?>
       		<option value="<?php echo $categorie->id; ?>"><?php  echo $categorie->nomC;?></option>
       	<?php  endforeach; ?>
       	</select><br/ >
       </fieldset>
       	<label id="scat_l">Choisir une sous-catégorie</label>
       <fieldset>
       	<select name="sousCate" id="sousCat" disabled class="form-control">
       		<option value="none" selected="selected">Choisissez une sous catégorie</option>
       	</select><br/>
       </fieldset>
       <fieldset>
           <label id="contenu_l">Choisir un type de contenu</label>
         <select name="choix" id="choix" class="form-control">
           <option value="none" selected="selected">Choisissez un type de contenu</option>
             <?php foreach($types as $type): ?>
                 <option value="<?php echo $type->id; ?>"><?php echo $type->nom;?></option>
             <?php  endforeach; ?>
         </select><br/ >
       </fieldset>
       <fieldset>
           <label id="titre_l">Titre</label>
        <input type="text" name="title" placeholder="Titre" id="title" class="form-control" required/>
       </fieldset><br/ >
       <fieldset>
           <label>Description</label>
        <textarea rows="4" cols="40" name="desc" placeholder="Courte description (facultative)" id="desc" class="form-control"></textarea>
       </fieldset><br/ >
          <fieldset>
              <div id="contenu">

              </div>
          </fieldset><br />
          <button class="btn btn-primary" id="valider">Valider</button>
      </section>
    </div>
  </div>
</div>