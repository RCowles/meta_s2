/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */(function(){var e,t,n;e=document.getElementById("site-navigation");if(!e)return;t=e.getElementsByTagName("h1")[0];if("undefined"==typeof t)return;n=e.getElementsByTagName("ul")[0];if("undefined"==typeof n){t.style.display="none";return}-1===n.className.indexOf("nav-menu")&&(n.className+=" nav-menu");t.onclick=function(){-1!==e.className.indexOf("toggled")?e.className=e.className.replace(" toggled",""):e.className+=" toggled"}})();