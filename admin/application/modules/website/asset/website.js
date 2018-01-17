var $ = jQuery;

$(document).ready(function(){
						   
	$(".colorbox").colorbox({
		fixed: true,
		innerWidth: '600px',
	});
	$( "input[name$='fullname']").focus();
	
});

$('#form_update').ajaxForm({
	url: $(this).attr('action'),
	//type: 'post',
	dataType: 'json',
	beforeSend: function()
	{
		$('#form_response').html('<img src="'+base_url+'assets/images/loaders/loader3.gif" />');
		$('#form_update :input').attr('disabled', true);
	},
	success: function(response)
	{
		if (response.status != 'success')
		{
			$('#form_update :input').attr('disabled', false);	
			$.each(response.message, function(key, val) {
				if (val != "")
				{
					$('label[for='+key+']').html(val);
				}
				else
				{
					$('label[for='+key+']').html('');	
				}
			});
			
			$('#form_response').html('');
		}
		else
		{
			$('#form_response').html(''+response.message+'');
			
			$('label[for="website_name"]').html('');
			$('label[for="url"]').html('');
			$('label[for="facebook"]').html('');
			$('label[for="meta_description"]').html('');
			$('label[for="meta_keyword"]').html('');
			$('label[for="email"]').html('');
			$('label[for="telephone"]').html('');
			$('label[for="bank_account"]').html('');
			$('label[for="userfile"]').html('');
			
			$('#form_update :input').attr('disabled', false);
		}
	}
});