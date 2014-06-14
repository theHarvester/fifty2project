var expression = /[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/gi;
var regex = new RegExp(expression);

$(document).ready(function() {
    var inputText = $('#search-text');

    if(isEmpty(inputText.val())){
        inputText.val(inputText.attr('data-placeholder'));
        inputText.css('color', 'grey');
    }

    inputText.focus(function(){
        if(inputText.val() == inputText.attr('data-placeholder')) {
            inputText.val('');
            inputText.css('color', 'black');
        }
    });

    inputText.blur(function () {
        if(isEmpty(inputText.val())){
            inputText.val(inputText.attr('data-placeholder'));
            inputText.css('color', 'grey');
        }
    });
});

function isEmpty(str) {
    return (!str || 0 === str.length);
}