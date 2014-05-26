var focalInt = 1;

$(document).ready(function(){
	$('#slider').on("change mousemove", function(){
		if(focalInt != $(this).val()){
			focalInt = $(this).val();
			changeFocal();
		}
	});
});

function changeFocal(){
	//#svg-image-2:hover { filter:url(#blur-effect-2); }
	if(focalInt == 1){
		$('#svg-image').css('filter', 'url(#blur-effect-4)');
		$('#svg-image-2').css('filter', 'url(#blur-effect-2)');
	} else if(focalInt == 2){
	
	}
	
	console.log('set focal to ' + focalInt);
}