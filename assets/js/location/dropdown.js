import {handleAnimation} from './arrow.js';
import sanitizeString from '/assets/js/utils/sanitizeInlineStyles.js';

/**
 * @type {HTMLElement}
 */
const dropdown = document.querySelector('.dropdown');
const dropdown__menu = document.querySelector('.dropdown__menu');
const namePLaceholder = document.querySelector('.dropdown__default');

const menuState = {
    /** Set of callbacks
     * @type {Set}
     */
    callbacks: new Set(),

    /** State of open/close menu
     * @type {boolean}
     */
    state: false,
    
    /**
     * Toggles the state and calls subscribers. Returns the new state
     *  @returns {boolean}
     */
    toogleState: function(){
        this.state = !this.state
        this.callSubscribers();
    },

    
    /**
     * Add a callback function to the list of subscribers.
     * also ties fn with this
     * @param {function} fn - The callback function to be added
     * @return {void} 
     */
    subscribe: function(fn){
        this.callbacks.add(fn.bind(this));
    },
    /**
     * Executes all the registered subscriber functions.
     */
    callSubscribers: function(){
        if(this.callbacks.length === 0) return;
        this.callbacks.forEach(fn => fn());
    },

    closeIfOpened: function(){
        if(this.state){
            this.state = false;
            this.callSubscribers();
        }
    }
};


/**INIT, EVENTLISTENERS CREATION */
(function init(){
    if(handleAnimation){
        menuState.subscribe(handleAnimation);
    }

    menuState.subscribe(toggleActiveClass);

    document.addEventListener('click', (e) => {
        if(e.target.closest('.dropdown')) return;
        menuState.closeIfOpened();
    });

    if(dropdown__menu){
        dropdown__menu.addEventListener('click', selectElement);
    }
})();



export function openCloseMenu(){
    if(!dropdown) return; 
    menuState.toogleState();
}

function toggleActiveClass(){
    if(!dropdown) return;
    dropdown.classList.toggle('active');
}


function selectElement(e){
    if(!dropdown__menu) return;
    const target = e.target.closest('.dropdown__item');
    const textPlace = namePLaceholder.querySelector('span');
    
    if(target && textPlace){
        textPlace.textContent =  sanitizeString(target.dataset.value);
    }
}

dropdown.addEventListener('click', openCloseMenu)