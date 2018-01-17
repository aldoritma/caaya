var $ = jQuery;

$(document).ready(function(){
	$( "input[name$='fullname']").focus();
	$(".colorbox").colorbox({
		fixed: true,
		innerWidth: '450px',
	});
});

/* Below is function for delete */
$('a.delete').on('click', function(e) {
							 
	e.preventDefault();
	var id = $(this).attr('id');
	var info = 'id=' + id;
	
	if(confirm('Do you want to delete this record ' + id + ' ?'))
	{
		$.ajax({
			type: 'post',
			url: base_url + 'direktori/' + id + '/hapus/ajax',
			data: info,
			beforeSend: function() {
				$('#row_' + id).css({'background-color' : '#f53737'});
			},
			success: function() {
				$('#row_' + id).slideUp();
			}
		});
	}
	return false
	
});