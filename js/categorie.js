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
		var value = $(this).children(":selected").attr("value");
		if(value!="none"){
			$.ajax({
				type: "POST",
				url: 'show',
				data: {"id":value},
				dataType:"HTML"
			}).done(function(response){
				$('#contenu').html(response);
			});
		}
	});

	$('#valider').click(function(event){
		$('#msg').hide();
        
        var scat = $("#scat_l");
        var cat = $('#cat_l')
        var title = $('#title_l');
	    //if($('#title').val().trim()!=="") {
	        if($("#cat").find(":selected").attr("value")!=="none") {
	            if($('#sousCat').find(":selected").attr("value")!=="none") {
	                //TODO
                } else {
                    console.log("ahah");
	                scat.css({"color" : "red"});
                    $('#msg').show();
                }
            } else {
	            cat.css({"color": "red"});
                //$('#msg').show();
            }/*
        } else {
        	//console.log("ahah");
	        //title.css("color", "red");
            //$('#msg').show();
        }*/
    });
});