
export default function transitionInit(){

    //if no startViewTransition func, return
    if(!document.startViewTransition) return;

    const anchors = document.querySelector('.mobile-menu_wrapper');

    anchors.addEventListener('click', transitionStart);

    // получить доступ к  меню. повесить одно событие клик. 
    // создать отдельную функцию для обработки события клик
}



function transitionStart(e){

    const target = e.target;
    if(target.tagName !== "A") return;

    e.preventDefault();
    const href = target.href;
    
    const transition = document.startViewTransition(() => {
        window.location.href = href;
    });
}