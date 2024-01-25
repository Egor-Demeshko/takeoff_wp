# page-location.php





# The Project and its Build

Our project build is carried out using the `vite` tool. In the `vite` settings, the creation of `preloadmodule` is disabled. The entry points for the builder are located in the '/build_entry_points' folder.


# Map Implementation

For map-related features in our application, we utilize OpenStreetMap. This open-source service provides comprehensive and detailed mapping capabilities, making it a valuable tool for our location-based functionality.
---
In `location.php`, we use OpenStreetMap for map-related features. The interaction with the map is managed through a package that we have installed and a global variable `var to_themePath`.


# API Description

Endpoint: `'shops/v1', 'shop'`
Methods: `GET`

This endpoint accepts one optional argument: a city name (e.g., "New York"). If a city name is provided, the endpoint returns data for all shops located in that city. If no argument is provided, the endpoint returns data for all shops.
---
Endpoint: `'shops/v1', 'shop/all_coors'`
Methods: `GET`

This endpoint accepts NONE arguments: returns all shops coordinates.