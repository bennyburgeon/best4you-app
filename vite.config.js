import { fileURLToPath } from 'node:url';
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import vueJsx from '@vitejs/plugin-vue-jsx';
import AutoImport from 'unplugin-auto-import/vite';
import Components from 'unplugin-vue-components/vite';
import { Vuetify3Resolver } from 'unplugin-vue-components/resolvers';
import vuetify from 'vite-plugin-vuetify';
import svgLoader from 'vite-svg-loader';

export default defineConfig({
    plugins: [
        laravel({
            input: ['src/frontend/main.js', 'src/admin/main.js'],
            refresh: true,
        }),
        vue(),
        vueJsx(),
        vuetify({
            styles: {
                configFile: 'src/admin/assets/styles/variables/_vuetify.scss',
            },
        }),
        Components({
            dirs: ['src/admin/@core/components', 'src/admin/components'],
            dts: true,
            resolvers: [
                Vuetify3Resolver(),
                componentName => {
                    if (componentName === 'VueApexCharts')
                        return { name: 'default', from: 'vue3-apexcharts', as: 'VueApexCharts' };
                },
            ],
        }),
        AutoImport({
            imports: ['vue', 'vue-router', '@vueuse/core', '@vueuse/math', 'pinia'],
            vueTemplate: true,
            ignore: ['useCookies', 'useStorage'],
            eslintrc: {
                enabled: true,
                filepath: './.eslintrc-auto-import.json',
            },
        }),
        svgLoader(),
    ],
    resolve: {
        alias: {
            '@': fileURLToPath(new URL('./src', import.meta.url)),
            '@admin': fileURLToPath(new URL('./src/admin', import.meta.url)),
            '@core': fileURLToPath(new URL('./src/admin/@core', import.meta.url)),
            '@layouts': fileURLToPath(new URL('./src/admin/@layouts', import.meta.url)),
            '@images': fileURLToPath(new URL('./src/admin/assets/images/', import.meta.url)),
            '@styles': fileURLToPath(new URL('./src/admin/assets/styles/', import.meta.url)),
            '@configured-variables': fileURLToPath(new URL('./src/admin/assets/styles/variables/_template.scss', import.meta.url)),
            '/assets': fileURLToPath(new URL('./public/frontend/assets', import.meta.url)),
        },
    },


    build: {
        chunkSizeWarningLimit: 5000,
    },
    optimizeDeps: {
        exclude: ['vuetify'],
        entries: [
            './src/**/*.vue',
        ],
    },
});
