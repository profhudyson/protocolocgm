@section ('scripts')
$(document).ready(function () {
    $('#Rank').bind('change', function () {
        var elements = $('div.container').children().hide(); // hide all the elements
        var value = $(this).val();

        if (value.length) { // if somethings' selected
            elements.filter('.' + value).show(); // show the ones we want
        }
    }).trigger('change'); // Setup the initial states
});