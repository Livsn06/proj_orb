
$(document).ready(function () {
    $(".faq-answer").hide();

 
    $(".faq-question").on("click", function () {
        $(this).next().slideToggle();
    });


    $("#faq-search").on("input", function () {
        var searchTerm = $(this).val().toLowerCase();
        $(".faq-container").hide();
        $(".faq-question:contains('" + searchTerm + "')").closest('.faq-container').show();
    });
});

$.expr[":"].contains = $.expr.createPseudo(function(arg) {
    return function( elem ) {
        return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
    };
});
