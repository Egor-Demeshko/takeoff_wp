(function startMenu (){
    const menuIcon = document.querySelector('.menu_icon');
    const menu = document.querySelector('.mobile-menu_wrapper');
    var state = false;
    if(!menuIcon || !menu) return;

    menuIcon.addEventListener('click', () => {
        if(state){
            closeMenu();
        } else {
            state = true;
            menu.style.transform = 'translateX(-100%)';
            setTimeout(() => {
                menu.style.backgroundColor = "var(--black-opac)";
            }, 400);
        }
    });

    menu.addEventListener( "click", ({target}) => {
        if(target.classList.contains('mobile-menu_wrapper') && state){
            closeMenu();
        }
    });



    function closeMenu(){
        state = false;
        menu.style.backgroundColor = "transparent";
        menu.style.transform = '';
    }
})();