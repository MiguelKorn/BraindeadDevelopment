var triangle = $("#triangle");

changeTriangle();

$(window).resize(function () {
    changeTriangle();
});

function changeTriangle() {
    var windowWidth = $(window).width();
    var triangleHeight = windowWidth / 12;
    triangle.css("border-width", triangleHeight + "px " + windowWidth + "px 0 0")
}