// vite.config.js
export default {
  build: {
    minify: false,
    assetsInlineLimit: 0,
    rollupOptions: {
      output: {
        entryFileNames: `[name].js`,
        chunkFileNames: `[name].js`,
        assetFileNames: `[name].[ext]`
      }
    },
    emptyOutDir: false
  }
}

