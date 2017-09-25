var navHeight = $('.navbar').outerHeight();

$('body').scrollspy({
    target: '.navbar',
    offset: navHeight
});

// Add smooth scrolling on all links inside the navbar
$(".navbar a[href^='#']").on('click', function (e) {
    e.preventDefault();
    var hash = this.hash;
    // animate
    $('html, body').animate({
        scrollTop: $(hash).offset().top - navHeight
    }, 800, function () {
        window.location.hash = hash;
    });

});