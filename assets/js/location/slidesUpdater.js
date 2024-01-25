import { subscribe } from "./dropdown";
import sanitizeString from '/assets/js/utils/sanitizeInlineStyles.js';

/**
 * @type {string}
 * @description Class name for dropdown element
 */
const DROPDOWN = 'dropdown';

const fadeTime = document.body.dataset.fadetime || 400;

export default class SlidesUpdater{
    faded = false;
    /**
     * 
     * @param {Glide} glideElement 
     */
    constructor(glideElement, className){
        this.glideElement = glideElement;
        this.className = className;
        this.dropdown = document.querySelector(`.${DROPDOWN}`);
        this.track = document.querySelector(`.${this.className} .glide__track`);

        if(!this.dropdown || !this.track) {
            console.error("couldn't find dropdown or track element");
            return;
        }

        document.addEventListener("dropdown_picked", this.onOptionClick.bind(this));

        subscribe(this.fadeoutTrack.bind(this));
    }


    /**
     * Asynchronously fades out the track.
     *
     * @param {boolean} state - the state of the track
     * @return {Promise} a Promise that resolves when the fading out is complete
     */
    async fadeoutTrack(state){
        if(!state) {
            setTimeout(() => this.fadeinTrack(), fadeTime); 
            return;
        }

        await new Promise( (resolve, reject) => {
            const slides = this.track.firstElementChild;
            if(!slides) reject("no slides found");
            slides.classList.add('glide__slide--faded');
            setTimeout(() => {
                resolve();
            }, fadeTime);
        });
    }

    /**
     * An asynchronous function to fade in the track.
     *
     * @return {Promise} A promise that resolves when the track has finished fading in.
     */
    async fadeinTrack(){

        await new Promise( (resolve, reject) => {
            const slides = this.track.firstElementChild;
            if(!slides) reject("no slides found");

            slides.classList.remove('glide__slide--faded');
            setTimeout(() => {
                resolve();
            }, fadeTime);
        });
    }


    async onOptionClick({detail}){
        const name = detail.name;
        if(this.lastPicked === name) {
            await this.fadeinTrack();
            return;
        };
        this.lastPicked = name;

        await this.buildNewMarkUp( await this.getData(name));

        /**FADE IN */
        try{
            await this.fadeinTrack();
        } catch {
            console.error("couldn't fade out track");
        }
    }
        

    async getData(id){
        const response = await fetch(`/wp-json/shops/v1/shop?to_city=${id}`);
        const data = await response.json();
        return data;
    }


    async buildNewMarkUp(data){

        if(!data || !data.length || !data instanceof Array) {
            console.error("Error on building new markup");
            return;
        };

        const slides = this.track.firstElementChild;
        const coordinates = [];

        if(!slides) return;
        slides.innerHTML = '';

        data.forEach((data) => {
                let {
                    background_picture,
                    to_address,
                    to_city,
                    to_coordinates,
                    to_google_maps_link,
                    to_logo_picture,
                    to_phone_number,
                    to_shop_name
                } = data.data;
                const slide = document.createElement('div');
                slide.setAttribute("role", "region");
                slide.setAttribute("aria-label", "Shop card");
                slide.classList.add('address_card');
                let cleanedPhoneNumber = to_phone_number.replace(/[-_(),.\s]/g, '');

                background_picture =sanitizeString(background_picture);
                to_address = sanitizeString(to_address);
                to_city = sanitizeString(to_city);
                to_coordinates = sanitizeString(to_coordinates);
                to_google_maps_link = sanitizeString(to_google_maps_link);
                to_logo_picture = sanitizeString(to_logo_picture);
                to_phone_number = sanitizeString(to_phone_number);
                to_shop_name = sanitizeString(to_shop_name);

                slide.innerHTML = `
                    <div class="address_card__top" style="background-image: url('${background_picture}');" role="presentation" aria-label="Shop card background">
                    </div>
                    <div class="address_card__bottom">
                        <div class="address_card__logo" role="presentation" aria-label="Shop logo" title="Shop logo">
                            <img aria-hidden="true" src="${to_logo_picture}"/>
                        </div>
                        <div class="address_card__info">
                            <a class="address_card__info--accent" href="tel:${cleanedPhoneNumber}" role="link" aria-label="Phone number">${to_phone_number}</a>
                            <a class="address_card__info--black" target="_blank" href="${to_google_maps_link}" role="link" aria-label="Google maps link" title="Google maps link">
                                ${to_address}
                            </a>
                        </div>
                    </div>
                `;
                slides.appendChild(slide);

                if(to_coordinates){
                    let updated_coordinates = to_coordinates.split(',').map( coor => {
                        coor = coor.trim();
                        return Number(coor);
                    });

                    updated_coordinates = updated_coordinates;
                    coordinates.push(updated_coordinates.reverse());
                }
            }
        );

        document.dispatchEvent( new CustomEvent( "change_map_coors", {
            detail: {
                coors: coordinates
            }
        }));
    }

}