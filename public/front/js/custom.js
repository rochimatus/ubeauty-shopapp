$(".cobaCategory").click(function(){
	var str = $(this).text();
	$('#filter-category').html(str+' <i class="right fas fa-caret-down"></i>');
	$(this).closest('p').closest('.select_option_dropdown').slideToggle('100');
    $('#inputCategory').val($(this).data('id'));
});

$(".cobaSort").click(function(){
	var str = $(this).text();
	$('#filter-sort').html(str+'<i class="right fas fa-caret-down"></i>');
	$(this).closest('p').closest('.select_option_dropdown').slideToggle('100');
	$('#inputSort').val($(this).data('id'));
});

$(".cobaAcdc").click(function(){
	var str = $(this).text();
	$('#filter-acdc').html(str+'<i class="right fas fa-caret-down"></i>');
	$(this).closest('p').closest('.select_option_dropdown').slideToggle('100');
	$('#inputAcdc').val($(this).data('id'));
});