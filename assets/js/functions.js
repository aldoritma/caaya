
 var $ = jQuery;
    $(".form_create").ajaxForm({
        url: $(this).attr("action"),
        type: "post",
        dataType: "json",
        beforeSend: function() {
            $("#btnloading").attr("value", "Submiting...."), $(".form_create :input").attr("disabled", !0)
        },

         success: function(response)
    {
      if (response.status != 'success')
      {
      	  $("#btnloading").attr("value", "Submit Request");
        $('.form_create :input').attr('disabled', false); 
        $.each(response.message, function(key, val) {
          $('rome[for="'+key+'"]').html(val);
        });

      }
      else
      {
          setTimeout(function() {
          $("html, body").animate({ scrollTop:265 }, "slow");
          location.reload();
        }, 1000);

        $('.form_create')[0].reset();
        $('textarea#textarea2').val(" ");
        $('.form_create :input').attr('disabled', false);
      }
    }
    });

 var $ = jQuery;
    $(".form_activity").ajaxForm({
        url: $(this).attr("action"),
        type: "post",
        dataType: "json",
        beforeSend: function() {
            $("#btnloading").attr("value", "Submiting...."), $(".form_activity :input").attr("disabled", !0)
        },

         success: function(response)
    {
      if (response.status != 'success')
      {
          $("#btnloading").attr("value", "Submit Request");
        $('.form_activity :input').attr('disabled', false); 
        $.each(response.message, function(key, val) {
          $('span[for="'+key+'"]').html(val);
        });

      }
      else
      {
          setTimeout(function() {
          $("html, body").animate({ scrollTop:265 }, "slow");
          location.reload();
        }, 1000);

        $('.form_activity')[0].reset();
        $('.form_activity :input').attr('disabled', false);
      }
    }
    });





