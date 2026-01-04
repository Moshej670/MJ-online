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
    
    function toggleDarkMode(event) {
        event.preventDefault();
        const toggle = document.getElementById('darkModeToggle');
        
        if ($("body").hasClass("dark")) {
            setTheme('standard');
            toggle.textContent = '🌙 Dark Mode';
        } else {
            setTheme('dark');
            toggle.textContent = '☀️ Light Mode';
        }
    }
    
    // Set initial toggle text based on current theme
    $(document).ready(function() {
        const toggle = document.getElementById('darkModeToggle');
        if (toggle) {
            if ($("body").hasClass("dark")) {
                toggle.textContent = '☀️ Light Mode';
            }
        }
    });