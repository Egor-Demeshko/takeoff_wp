import './space/space';
import start from './gesture_rules/topDownSlides';
import './menu/menu.js';
import transitionInit from '/assets/js/menu/menuTransition.js';

transitionInit();
const blockAnimations = start({animationTime: 800});
blockAnimations.findElements();