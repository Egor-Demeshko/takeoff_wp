// vite.config.js
export default {
  build: {
    minify: false,
    modulePreload: {
      polyfill: false
    },
    rollupOptions: {
      input: {
        index: 'build_entry_points/index.html',
        location: 'build_entry_points/location.html',
        map: 'build_entry_points/map.html'
      },
      output: {
        entryFileNames: `[name].js`,
        chunkFileNames: `[name].js`,
        assetFileNames: `[name].[ext]`
      }
    }
  }
}

