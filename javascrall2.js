var setTheme = function (theme) {
if (theme === 'dark') {
// dark
$( "body" ).removeClass("standard");
$( "body" ).addClass( "dark" );
$(".inner-switch").text("ON");
setCookie('Theme', 'dark', 30);
} else {
$("body").removeClass("dark");
$("body").addClass("standard");
$(".inner-switch").text("OFF");
setCookie('Theme', 'standard', 30);
}
};

currentTheme = getCookie('Theme');
setTheme(currentTheme);
