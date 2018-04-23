<br/ >
<br/ >

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card bg-faded">
                <h2 class="text-center">Type de contenu : </h2>
                <div class="card-body">
                    <?php foreach($types as $type): ?>
                        <button class="btn btn-outline-primary" style="margin-left:120px;"><?php echo $type->nom;?></button>
                    <?php  endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
