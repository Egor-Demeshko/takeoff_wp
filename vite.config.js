// vite.config.js
export default {
    build: {
        minify: true,
        modulePreload: {
            polyfill: false,
        },
        rollupOptions: {
            input: {
                index: "build_entry_points/index.html",
                location: "build_entry_points/location.html",
                map: "build_entry_points/map.html",
                learn_more: "build_entry_points/learn_more.html",
                verify: "build_entry_points/verify.html",
            },
            output: {
                entryFileNames: `[name].js`,
                chunkFileNames: `[name].js`,
                assetFileNames: `[name].[ext]`,
            },
        },
    },
};
