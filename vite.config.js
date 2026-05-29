import { defineConfig } from "vite";
import vue from "@vitejs/plugin-vue";

export default defineConfig(() => {
  const isWatchBuild = process.argv.includes("--watch");

  return {
    plugins: [
      vue({
        template: {
          transformAssetUrls: {
            includeAbsolute: false,
          },
        },
      }),
    ],
    resolve: {
      extensions: [".mjs", ".js", ".ts", ".jsx", ".tsx", ".json", ".vue"],
    },
    build: {
      outDir: "source/assets/build",
      // In watch mode, avoid removing the output directory between rebuilds.
      // This prevents BrowserSync from reloading during a moment where hashed assets
      // are temporarily missing, which causes 404 + MIME type errors.
      emptyOutDir: !isWatchBuild,
      manifest: "manifest.json",
      sourcemap: true,
      ...(isWatchBuild
        ? {
            watch: {
              // Prevent watch mode from retriggering on generated files.
              exclude: ["source/assets/build/**"],
              // Debounce editor saves and avoid rebuild storms.
              awaitWriteFinish: {
                stabilityThreshold: 200,
                pollInterval: 50,
              },
            },
          }
        : {}),
      rollupOptions: {
        input: {
          app: "source/_assets/js/app.js",
          main: "source/_assets/js/main.js",
          highlight: "source/_assets/js/highlight.js",
          search: "source/_assets/js/search.js",
          "help-search": "source/_assets/js/help-search.js",
          "article-heading-links": "source/_assets/js/article-heading-links.js",
          styles: "source/_assets/css/main.css",
          "hero-animation": "source/_assets/js/hero-animation.js",
        },
      },
    },
  };
});
