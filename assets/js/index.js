import './space/space';
import start from './gesture_rules/topDownSlides';
import './menu/menu.js';


blockAnimations = start({animationTime: 800});
blockAnimations.findElements();