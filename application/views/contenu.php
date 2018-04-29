<br/ >
<br/ >
<script src="<?php echo base_url();?>js/view.js"></script>
<div style="display: none">
    <p id="cat"><?php  echo $tabc["cat"] ?></p>
    <p id="scat"><?php  echo $tabc["scat"] ?></p>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card bg-faded">
                <h2 class="text-center">Type de contenu : </h2>
                <div class="card-body">
                    <?php foreach($types as $type): ?>
                        <button class="btn btn-outline-primary" style="margin-left:120px;"><?php echo $type->nom;?><span id="th<?php echo $type->id; ?>" class="badge badge-light"></span></button>
                    <?php  endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-12" style="margin-top: 3%;">
            <div class="card bd-faded">
                <div class="card-body" id="cont">

                </div>
            </div>
        </div>
    </div>
</div>
