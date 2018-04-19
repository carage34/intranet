$(function() {
    $('#msg').hide();
    $('#msg').text("Veuillez remplir tous les champs");
	$("#cat").change(function() {
		var value = $(this).children(":selected").attr("value");
		var real = $( "#cat option:selected" ).text();
		if(value!="none") {
			$('#sousCat').find('option').remove();
			$('#sousCat').prop("disabled", false);
            $('#sousCat')
                .append($("<option></option>")
                    .attr("value","none")
                    .text("Choisir une sous catégorie"));
			$.ajax({
				url:'add/getSousCat/'+value,
				type: 'POST',
				dataType: 'JSON',
				success:function (data) {
					$('#sousCat').append(data);
				}
			});
		} else {
            $('#sousCat').find("option").remove();
            $('#sousCat')
                .append($("<option></option>")
                    .attr("value","none")
                    .text("Choisir une sous catégorie"));
            $('#sousCat').prop("disabled", true);
		}
	});
	$('#choix').change(function(){
		valeur = $(this).find(":selected").attr("value");
        console.log("valeur "+valeur);
		if(valeur!=="none"){
			$.ajax({
				type: "POST",
				url: 'show',
				data: {"id":valeur},
				dataType:"HTML"
			}).done(function(response){
				$('#contenu').html(response);
			});
		}
	});

    $(document).on('submit','#formu',function(e){
        e.preventDefault();
        var form = $('#formu');
        e.stopImmediatePropagation();
		$('#msg').hide();
        var ok = false;
        var scat = $("#scat_l");
        var cat = $('#cat_l')
        var title = $('#titre_l');
        var choix = $('#contenu_l')
        cat.css({"color": "black"});
        scat.css({"color": "black"});
        title.css({"color": "black"});
        choix.css({"color": "black"});
        if($("#cat").find(":selected").attr("value")==="none") {
            cat.css({"color": "red"});
            ok =true;
        }
		if($('#sousCat').find(":selected").attr("value")==="none") {
            scat.css({"color": "red"});
            ok=true;
		}
        if($('#title').val().trim()==="") {
        	title.css({"color": "red"});
        	ok=true;
		}
		if($('#choix').find(":selected").attr("value")==="none") {
        	choix.css({"color": "red"});
            ok=true;
		}
        var valeur = $("#choix").find(":selected").attr("value");
        console.log(valeur);
		var titre = $('#title').val();
		if(ok===true) {
        	$('#msg').show();
		} else {
            if(valeur=="1") {
                if($('#upload').val()) {
                    //alert("Fichier choisi");
                    var formdata = new FormData(this);
                    $.ajax({
                        url: 'add/insertData',
                        data: formdata,
                        processData:false,
                        contentType:false,
						cache:false,
                        type: 'POST',
                        success: function(data) {
                            alert(data);
                        }
                    });
                } else {
                    //alert("Veuillez choisir un fichier");
                }
            }
        }
        return false;
    });
});