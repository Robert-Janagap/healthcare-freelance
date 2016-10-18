(function($){
	$('.overlay').on('click', function(){
		$('.modal').removeClass('open');
		$('.modal2').removeClass('open');
		$(this).removeClass('open');
	});
	$('.close_btn').on('click', function(){
		$('.modal').removeClass('open');
		$('.modal2').removeClass('open');
		$('.overlay').removeClass('open');
	});
	$('.open-modal').on('click', function(){
		$('.modal2').removeClass('open');
		$('.modal').addClass('open');
		$('.overlay').addClass('open');
	});
	$('.open-modal2').on('click', function(){
		$('.modal').removeClass('open');
		$('.modal2').addClass('open');
		$('.overlay').addClass('open');
	});

	$('.search_filter').on('click', function(){
		$('.search_filter').removeClass('active');
		$(this).addClass('active');
	});
	$(window).on('load', function(){
		year_loop(2017, 1950);
	});
	var year_loop = function(start, end){
		var year_start = start;
		var year_end = end;
		var loop_ctrl = year_start-year_end;
		for(var k = 0, years = loop_ctrl; k < loop_ctrl; k++){
			year_start--;
			$('#year_list').append("<option value="+year_start+">"+year_start+"</option>");
		}
	};
})(jQuery);