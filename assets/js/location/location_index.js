import './dropdown.js';
import '../menu/menu.js';
import './arrow.js';
import glideInit from '../utils/glide.js';
import SlidesUpdater from './slidesUpdater.js';

/**class name for first slider */
const FIRSTGLIDE = 'glide';


const glide = glideInit({
    className: FIRSTGLIDE
});

const slidesUpdater = new SlidesUpdater(glide, FIRSTGLIDE);