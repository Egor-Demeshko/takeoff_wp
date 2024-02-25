import './codecheckflow';

(
    function verifypage(){
        const verifyForm = document.querySelector('.verify__form');
        const input = verifyForm.querySelector('.code__input');
        const submit = verifyForm.querySelector('.verify__submit');

        if(!verifyForm || !input || !submit){
            console.error("Can't find verify form elements");
            return;
        }

        init();

        function init(){
            input.addEventListener('change', inputChanged);
        }
    }
)();


function inputChanged({target}){

    /** to keep the label in the designated place */
    if(target.value.length === 0){
        target.dataset.filled = false;
    } else {
        target.dataset.filled = true;
    }

}



