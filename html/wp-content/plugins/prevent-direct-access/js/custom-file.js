(function(window, $) {
	var customFile = {
		preventFile : _pda_preventFile,
		copyToClipboard: _pda_copyToClipboard,
		pda_prevent_all: _pda_prevent_all
	};

	function _pda_prevent_all() {
		$('.pda_cbk').each(function() {
			$(this).trigger("click");
		});
	}

	function _pda_preventFile(fileId){
		var checkBoxId = "#ckb_" + fileId;
		var isPrevented = $(checkBoxId).is(':checked') ? 1 : 0;

		$.ajax({
		    url: ajax_object.ajaxurl, // this is the object instantiated in wp_localize_script function
		    type: 'POST',
		    data:{
		      action: 'myaction',
		      id: fileId, // this is the function in your functions.php that will be triggered
		      is_prevented: isPrevented,
					security_check: $(checkBoxId).attr('nonce')
		    },
		    success: function( data ){
		      //Do something with the result from server
		      if(typeof data.error !== 'undefined') {
		      	$(checkBoxId).prop('checked', false);
		      	alert(data.error);
		      } else if (data == 'invalid_nonce') {
		      	alert('No! No! No! Verify Nonce Fails!');
		      	if ($(checkBoxId).is(':checked')) {
		      		$(checkBoxId).prop('checked', false);
		      	} else {
		      		$(checkBoxId).prop('checked', true);
		      	}
		      } else {
		      	var labelId = "#custom_url_" + data.post_id;
		      	var btnCopyId = '#btn_copy_' + data.post_id;
		      	var divCustomUrlId = '#custom_url_div_' + data.post_id;
		      	var custom_url_class = '.custom_url_' + data.post_id;
		      	if(data.is_prevented === "1"){
		      		$(custom_url_class).fadeIn();
		      		$(labelId).val(data.url);
		      	} else {
		      		$(custom_url_class).fadeOut();
		      	}
		      }
		    },
		    error: function (error) {
		    	console.log("Errors", error);
		    	alert(error.responseText);
		    }
		  });
	}

	window.customFile = customFile;

	function _pda_copyToClipboard(btn, txt_input) {
  		var $temp = $("<input>");
  		$("body").append($temp);
  		$temp.val($(txt_input).val()).select();
  		document.execCommand("copy");
  		$temp.remove();

  		$(btn).text("URL Copied");
		setTimeout(function() {
		 	$(btn).text("Copy URL");
		}, 5000);
	}

})(window, jQuery);
