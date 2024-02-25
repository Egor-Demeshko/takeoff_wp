
/**
 * @description Prepares coors from the server. Coordinates coom as a plain string, and Open Layers will wait 
 * for an Array
 * @param {Array.<string>} coors - shops coors
 * @returns {Array.<Array.<number>>}
 */
export default function prepareCoors(coors) {
    /**
     * @param {Array.<number>} coor
     */
    const newCoors = coors.map( (coor) => {
        return  coor.split(',')
                .map( coor => {
                    coor = coor.trim();
                    return Number(coor);
                })
                .reverse();
    });

    return newCoors;
}