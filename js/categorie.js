$(function() {
	$("#cat").change(function() {
		var value = $(this).children(":selected").attr("value");
		var real = $( "#cat option:selected" ).text();
		if(value!="none") {
			$('#sousCat').find('option').remove();
			$('#sousCat').prop("disabled", false);
			console.log("ahah");
			$.ajax({
				url:'add/getSousCat/'+value,
				type: 'POST',
				dataType: 'JSON',
				success:function (data) {
					$('#sousCat').append(data);
				}
			});
		} else {
			$('#sousCat').prop("disabled", true);
		}
	})
});