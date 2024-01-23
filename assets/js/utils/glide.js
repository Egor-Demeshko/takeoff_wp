import Glide from '@glidejs/glide';



/**
 * Initializes a Glide carousel with the specified class name.
 *
 * @param {Object} options - The options for initializing the carousel.
 * @param {string} options.className - The class name of the carousel container.
 * @return {Glide} The initialized Glide carousel object.
 */
export default function glideInit({className}) {
    const cards = document.querySelector(`.${className} .address_card`);
    const windowWindth = window.innerWidth;
    const arrows = document.querySelectorAll(`.${className} .glide__arrows .glide__arrow`);

    /**if we have a single card and it's not a mobile device, then we don't enable glide */
    if(cards.length < 3 && windowWindth > 500) return;

    if(arrows && arrows.length > 0) {
        arrows.forEach( (arrow) => {
            arrow.style.display = 'block';
        });
    }
    const glide = new Glide(`.${className}`, {
        type: 'carousel',
        startAt: 0,
        perView: 3,
        breakpoints: {
            800: {
                perView: 2
            },
            500: {
                perView: 1
            }
        }
    });

    glide.mount();
    return glide;
}
