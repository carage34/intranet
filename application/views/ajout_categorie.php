
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <section>
        <h4 style="text-align:center;">Ajouter une catégorie</h4>
        <br/>
        <?php
        echo form_open('ajout/index');
        echo validation_errors();
        ?>
        <label>Nom de la catégorie : </label>
        <fieldset>
        	<?php $cat = array('type'=>'text','name'=>'cat', 'id'=>'cat', 'placeholder'=>'Nom de la catégorie', 'value'=>set_value('cat'), 'class'=>'form-control'); echo form_input($cat); ?>
        </fieldset><br/>
        <input type="submit" class="btn btn-primary" id="submit"></input><br/>
        <?php echo form_close(); ?>
        <hr><br/>
        <h4 style="text-align:center;">Ajouter une sous catégorie</h4>
        	<?php  echo form_open('ajout/sous');
        		   echo validation_errors();
        	 ?>
       <label>Choisir une catégorie : </label>
       <fieldset>
       	<select name="cate" class="form-control">
       		<option value="none" selected="selected">Choisissez une catégorie</option>
       		<?php foreach($categories as $categorie): ?>
       		<option value="<?php echo $categorie->id; ?>"><?php  echo $categorie->nomC;?></option>
       	<?php  endforeach; ?>
       	</select><br/>
       </fieldset>
        <br/><label style="font-size:17px;">Nom de la sous-catégorie : </label>
        <fieldset>
        	<?php $scat = array('type'=>'text','name'=>'scat', 'id'=>'scat', 'placeholder'=>'Nom de la sous-catégorie', 'value'=>set_value('scat'), 'class'=>'form-control'); echo form_input($scat); ?>
        </fieldset><br/>
        <input type="submit" class="btn btn-primary" id="envS" name="submit"></input><br/>
      </section>
    </div>
  </div>
</div>
</body>
</html>