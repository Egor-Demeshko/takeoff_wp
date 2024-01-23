// vite.config.js
export default {
  build: {
    minify: false,
    rollupOptions: {
      input: {
        index: 'build_entry_points/index.html',
        location: 'build_entry_points/location.html'
      },
      output: {
        entryFileNames: `[name].js`,
        chunkFileNames: `[name].js`,
        assetFileNames: `[name].[ext]`
      }
    }
  }
}

