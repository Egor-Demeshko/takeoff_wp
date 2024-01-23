/**
 * @type {HTMLElement}
 */
const arrow = document.querySelector('.dropdown__icon');

/**
 * Update the arrow animation based on the given state.
 * @return {void} 
 */
export function handleAnimation(){
    if(!arrow || !this) return;

    if(this.state){
        arrow.style.transform = 'translateY(-50%) rotateZ(180deg)';
    } else {
        arrow.style.transform = 'translateY(-50%) rotateZ(0deg)';
    }
}