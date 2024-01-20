import {
    startAnimation as startSpaceAnimation,
    resetAnimation as resetSpaceAnimation
} from '/assets/js/space/space.js';

const videoDefaultRules = {
    position: "absolute",
    top: 0,
    left: 0,
    opacity: 1,
};

const spaceDefaultCss = {
    position: "absolute",
    top: 0,
    left: 0,
    opacity: 0,
};


/** If js disabled, than we have traditional layout,
 * if scripts enabled than we can perform out enhanced scroll effects
 * setupup css rules than applied with js.
 */
export default function startBlockAnimation({animationTime}){
    const spaceId = 'space';
    const videoId = 'video';
    const videoClass = '.video_wrapper';
    const TIME = animationTime;
    /**function to handle pointermove, for mobiles */
    const freezedMove = createFreezedEvent(() => handleWheel(), TIME);
    var space = null;
    var video = null;
    var activeBlock = videoId;

    return {
        findElements
    };

    function findElements(){
        space = document.getElementById(spaceId);
        video = document.querySelector(videoClass);
        if(!space || !video || (!TIME || TIME === 0)) return;

        prepareStyles();
        initListeners();
    }

    function prepareStyles(){

        for(let [key, value] of Object.entries(videoDefaultRules)){
            video.style[key] = `${value}`;
        };
        for(let [key, value] of Object.entries(spaceDefaultCss)){
            space.style[key] = `${value}`;
        }
        video.style.transition =`opacity ${TIME}ms ease, transform ${TIME}ms ease`;
        space.style.transition =`opacity ${TIME}ms ease, transform ${TIME}ms ease`;
    }

    function initListeners(){
        document.addEventListener("wheel", createFreezedEvent(handleWheel, TIME));
        if(window.innerWidth <= 500){
            document.addEventListener("pointermove", handleMove);
        }
    }


    function createFreezedEvent(fn, time){
        var isFreezed = false;

        return (e) => {
            if(isFreezed) return;
            isFreezed = true;
            setTimeout(() => isFreezed = false, time); 
            fn(e);  
        } 
    }

    /**easing function defined in prepare styles */
    function handleWheel(){
        //if video block active then current layer fades away, space layes pops up;
        if(activeBlock === videoId){
            video.style.opacity = 0;
            space.style.opacity = 1;
            activeBlock = spaceId;

            setTimeout( () => {
                video.style.transform = "translateY(-100%)";
                startSpaceAnimation();
            }, TIME);

            setTimeout( () => video.style.opacity = 1, 2 * TIME);

        } else if(activeBlock === spaceId){
            space.style.opacity = 0;
            video.style.transform = "translateY(0)";
            activeBlock = videoId;
            setTimeout( () => {
                resetSpaceAnimation();
            }, TIME);
        }
    }

    function handleMove(e){
    const threshold = 20; // threshold in pixels
    if(Math.abs(e.movementY) > threshold){
        freezedMove();
    }

    
}

}
