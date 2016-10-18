(function($){
	$('input[name="con_pass"]').on('blur', function(){
		var repass = $(this).val();
		var pass = $(this).parent().closest('form').children('div').children('input[name="pass"]').val();

		if (repass==pass) {
			$(this).parent().closest('form').children('button[name="submit"]').prop('disabled', false);
			$(this).parent().closest('form').children('button[name="submit"]').removeClass('disabled');
			$('.error').hide();
		} else {
			$('.error').show();
			$(this).parent().closest('form').children('button[name="submit"]').prop('disabled', true);
			$(this).parent().closest('form').children('button[name="submit"]').addClass('disabled');
		}
	});
})(jQuery);
