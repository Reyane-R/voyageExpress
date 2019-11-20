
// autocomplet : this function will be executed every time we change the text

function autocomplet2() {
	var keyword = $('#country_id2').val();
	$.ajax({
		url: 'pays_refresh.php',
		type: 'POST',
		data: {keyword:keyword},
		success:function(data){
			$('#country_list_id2').show();
			$('#country_list_id2').html(data);
		}
	});
}

// set_item : this function will be executed when we select an item
function set_item(item) {
	// change input value
	$('#country_id').val(item);
	// hide proposition list
	$('#country_list_id').hide();
}