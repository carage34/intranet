 <div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <section>
      	<h4 style="text-align: center;">Ajout de contenu</h4>
        <?php
        echo form_open('ajout/index');
        echo validation_errors();
        ?>
       <label>Choisir une catégorie : </label>
       <fieldset>
       	<select name="cate" id="cat" class="form-control">
       		<option value="none" selected="selected" >Choisissez une catégorie</option>
       		<?php foreach($categories as $categorie): ?>
       		<option value="<?php echo $categorie->id; ?>"><?php  echo $categorie->nomC;?></option>
       	<?php  endforeach; ?>
       	</select><br/ >
       </fieldset><br/ >
       	<label>Choisir une sous-catégorie</label>
       <fieldset>
       	<select name="sousCate" id="sousCat" disabled class="form-control">
       		<option value="none" selected="selected">Choisissez une sous catégorie</option>
       	</select><br/>
       </fieldset>
       <fieldset>
         <select name="choix" id="choix" class="form-control">
           <option value="none" selected="selected">Choisissez un type de contenu</option>
           <option value="file">Fichier</option>
           <option value="link">Liens web</option>
           <option value="text">Texte</option>
           <option value="video">Lien vidéo</option>
         </select><br/ >
       </fieldset>
       <fieldset>
        <input type="text" name="title" placeholder="Titre" id="title" class="form-control"></input>
       </fieldset><br/ >
       <fieldset>
        <textarea rows="4" cols="40" name="desc" placeholder="Courte description (facultative)" id="desc" class="form-control"></textarea>
       </fieldset>
        <?php echo form_close(); ?>
      </section>
    </div>
  </div>
</div>

</body>
</html>