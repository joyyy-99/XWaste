
function toggleDropdownMenu() {
    var dropdownMenu = document.querySelector('.dropdown-menu');
    dropdownMenu.classList.toggle('show');
}

window.addEventListener('resize', function() {
    var width = window.innerWidth;
    var dropdownMenu = document.querySelector('.dropdown-menu');

    // Hide dropdown menu on larger screens
    if (width > 768 && dropdownMenu.classList.contains('show')) {
        dropdownMenu.classList.remove('show');
    }
});
