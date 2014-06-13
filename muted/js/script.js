$(document).ready(function(){
    var tile = $('.tile');
    $(window).resize(function(){
        tile.css('height',($(window).height() - 120) / 3);
        tile.css('width',$(window).width() / 3);
    });
    tile.css('height',($(window).height()- 120) / 3);
    tile.css('width',$(window).width() / 3);

    tile.each(function(){
        $(this).css('background-color', getRandomMutedColor());
    });

    tile.click(function(){
        $(this).text(rgb2hex($(this).css('background-color')));
    });

    $('#generate').click(function(){
        tile.each(function(){
            $(this).css('background-color', getRandomMutedColor());
            $(this).text('');
        });
    });
});

function getRandomMutedColor() {
    return '#' + rand(80, 160).toString(16) + rand(80, 160).toString(16) + rand(80, 160).toString(16);
}

function rand(min, max){
    return Math.floor((Math.random() * max) + (min + 1));
}


var hexDigits = new Array("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f");

//Function to convert hex format to a rgb color
function rgb2hex(rgb) {
    rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
    return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
}

function hex(x) {
    return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
}