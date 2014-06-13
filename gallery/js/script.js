$(document).ready(function(){
    $( window ).resize(function() {
        $('.col-md-4').css('height',$('.col-md-4').css('width'));
    });
    $('.col-md-4').css('height',$('.col-md-4').css('width'));

    $('.col-md-4').each(function(){
        $(this).css('background-color', getRandomMutedColor());
    });
});

function getRandomMutedColor() {
    return '#' + rand(80, 160).toString(16) + rand(80, 160).toString(16) + rand(80, 160).toString(16);
}

function rand(min, max){
    return Math.floor((Math.random() * max) + (min + 1));
}