var focalInt = 1;

$(document).ready(function(){
    $('body').on({
        'mousewheel': function(e) {
            if (e.target.id == 'el') return;
            e.preventDefault();
            e.stopPropagation();
        }
    });

	$('#slider').on("change mousemove", function(){
		if(focalInt != $(this).val()){
			focalInt = $(this).val();
			changeFocal();
		}
	});

    var width = $(window).width() + 5;
    var height = $(window).height() + 5;
    var svgHeight = width / 1.34;
    var svgHeightNeg = svgHeight - height;


    $('#svg-image-blur').css('width', width+'px');
    $('#svg-image-blur').css('height', height+'px');

    $('#svg-bg').attr('width', width);
    $('#svg-bg').attr('height', svgHeight);
    $('#svg-bg').attr('y', '-' + svgHeightNeg);

    $('#svg-buildings').attr('width', width);
    $('#svg-buildings').attr('height', svgHeight);
    $('#svg-buildings').attr('y', '-' + svgHeightNeg);

    $('#svg-road').attr('width', width);
    $('#svg-road').attr('height', svgHeight);
    $('#svg-road').attr('y', '-' + svgHeightNeg);
//    $('#svg-buildings').css('filter', 'none');
//    $('#svg-road').css('filter', 'none');
});

$(document).keyup(function(e){
    if (e.keyCode == 38) {
        preventDefault(e);
        if(focalInt < 6){
            focalInt++;
            $('#slider').val(focalInt);
            changeFocal();
        }
        return false;
    }
    if (e.keyCode == 40) {
        preventDefault(e);
        if(focalInt > 1){
            focalInt--;
            $('#slider').val(focalInt);
            changeFocal();
        }
        return false;
    }
});

function changeFocal(){
	if(focalInt == 1){
		$('#svg-bg').css('filter', 'none');
        $('#svg-buildings').css('filter', 'none');
        $('#svg-road').css('filter', 'none');
	} else if(focalInt == 2) {
        $('#svg-bg').css('filter', 'url(#blur-effect-4)');
        $('#svg-buildings').css('filter', 'url(#blur-effect-2)');
        $('#svg-road').css('filter', 'none');
    } else if(focalInt == 3){
        $('#svg-bg').css('filter', 'url(#blur-effect-2)');
        $('#svg-buildings').css('filter', 'none');
        $('#svg-road').css('filter', 'url(#blur-effect-2)');
    } else if(focalInt == 4){
        $('#svg-bg').css('filter', 'none');
        $('#svg-buildings').css('filter', 'url(#blur-effect-2)');
        $('#svg-road').css('filter', 'url(#blur-effect-4)');
    }
}

// Disable scrolling
var keys = [37, 38, 39, 40];

function preventDefault(e) {
    e = e || window.event;
    if (e.preventDefault)
        e.preventDefault();
    e.returnValue = false;
}

$(document).keydown(function(e) {
    for (var i = keys.length; i--;) {
        if (e.keyCode === keys[i]) {
            preventDefault(e);
            return;
        }
    }
});

function wheel(e) {
    preventDefault(e);
}

function disable_scroll() {
    if (window.addEventListener) {
        window.addEventListener('DOMMouseScroll', wheel, false);
    }
    window.onmousewheel = document.onmousewheel = wheel;
    document.onkeydown = keydown;
}

function enable_scroll() {
    if (window.removeEventListener) {
        window.removeEventListener('DOMMouseScroll', wheel, false);
    }
    window.onmousewheel = document.onmousewheel = document.onkeydown = null;
}