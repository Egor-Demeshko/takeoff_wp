(function startMenu (){
    const menuIcon = document.querySelector('.menu_icon');
    const menu = document.querySelector('.mobile-menu_wrapper');
    var state = false;
    if(!menuIcon || !menu) {
        console.error("Can't find menu elements");
        return
    };

    menuIcon.addEventListener('click', () => {
        if(state){
            closeMenu();
        } else {
            state = true;
            menu.style.transform = 'translateX(-100%)';
            document.body.dataset.noscroll = "true";
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
        document.body.dataset.noscroll = "";
        menu.style.backgroundColor = "transparent";
        menu.style.transform = '';
    }
})();