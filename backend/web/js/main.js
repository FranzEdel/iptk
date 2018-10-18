$(function(){
	//alert('hola Edel');
	$('#modalButton').click(function(){
		$('#modal').modal('show')
		.find('#modalContent')
		.load($(this).attr('value'));
	});
});

$(function(){
	//alert('hola Edel');
	$('#modalButtonObj').click(function(){
		$('#modalObj').modal('show')
		.find('#modalContentObj')
		.load($(this).attr('value'));
	});
});

$(function(){
	//alert('hola Edel');
	$('#modalButtonRe').click(function(){
		$('#modalRe').modal('show')
		.find('#modalContentRe')
		.load($(this).attr('value'));
	});
});
