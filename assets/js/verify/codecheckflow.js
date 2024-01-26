import SubmitProcess from "./submitProcess.js";

/**
 * кликаем на кнопку
 * запускаем лоадер
 * шлем запрос на end route 
 * получаем ответ
 * проработать в том числе если запрос пустой?
 * отрисовываем результат
 */

class CodeCheckFlow extends SubmitProcess{

    form;
    input;
    button;
    status;
    constructor() {
        super();
        this.form = document.querySelector('.verify__form');
        this.input = document.querySelector('.code__input');
        this.button = document.querySelector('.verify__submit');
        this.status = document.getElementById('status');

        if(!this.form || !this.input || !this.button) {
            console.error("Can't find verify form elements");
            return null;
        }

        this.#initListeners();
    }


    #initListeners(){
        this.form.addEventListener('submit', super.onSubmit.bind(this));
    }

    showSuccess(message){
        if(!this.status){
            console.error("Can't find status element");
            return;
        }

        const textElement = this.status.firstElementChild;
        if(!textElement){
            console.error("Can't find status text");
            return;
        }

        textElement.textContent = message;
        this.status.classList.add('verify__success');
    }

    showError(message){
        if(!this.status){
            console.error("Can't find status element");
            return;
        }

        const textElement = this.status.firstElementChild;
        if(!textElement){
            console.error("Can't find status text");
            return;
        }

        textElement.textContent = message;
        this.status.classList.add('verify__error');
        
    }
}


const codeCheckFlow = new CodeCheckFlow();