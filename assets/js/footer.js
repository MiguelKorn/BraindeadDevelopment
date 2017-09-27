var contactPage = $('#contact');
var footer = contactPage.find('.footer');
var contactFormHeight = contactPage.find('.contact-form').outerHeight();

var contactPageHeight = contactPage.outerHeight();
var footerHeight = contactPageHeight - contactFormHeight;

footer.css('height', footerHeight + 'px');