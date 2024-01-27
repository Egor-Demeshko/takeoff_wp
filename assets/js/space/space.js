import {animate} from "motion";
import sanitizeString from "/assets/js/utils/sanitizeInlineStyles.js";

const earth = document.querySelector('.space__earth');
const background = document.querySelector('.space__image');
const smoke = document.querySelector(".space__smoke");
const elements = {
    earth,
    background,
    smoke    
};
const reverseStyles = {
    earth: {},
    background: {},
    smoke: {}
}

export function startAnimation(){
    if(!earth || !background ) return;

    const duration = 4;

    reverseStyles.earth.css = earth.style.cssText;
    reverseStyles.earth.animationCntr = animate(earth, {
        transform: "translate(-50%, 0%) scale(1)",
        filter: "blur(0px)",
    },
    {
        duration
    });

    reverseStyles.background.css = background.style.cssText;
    reverseStyles.background.animationCntr = animate(background, {
        transform: "translate(-50%, -50%) rotateZ(22deg)",
    },
    {
        duration
    });


    if(smoke){
        reverseStyles.smoke.css = smoke.style.cssText;

        if(window.innerWidth > 500){
            reverseStyles.smoke.animationCntr = animate(smoke, {
                right: "-25%"
            }, {duration});
        } else {
            reverseStyles.smoke.animationCntr = animate(smoke, {
                right: "-50%"
            }, {duration});
        }
    }
}

/**
 * we have predefined ccs styles, on our wish we can reset changes made by motion
 * to default css styles.*/
export function resetAnimation(){
    for(let [key, {animationCntr, css}] of Object.entries(reverseStyles)){
        animationCntr.cancel();
        elements[key].style.cssText = sanitizeString(css);
        reverseStyles[key] = {};
    }
}