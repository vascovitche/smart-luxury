import {defineConfig} from 'vite';
import {viteStaticCopy} from 'vite-plugin-static-copy';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        viteStaticCopy({
            targets: [
                {
                    src: 'node_modules/bootstrap/dist',
                    dest: '../modules/admin/plugins/bootstrap',
                },
                {
                    src: 'node_modules/jquery/dist',
                    dest: '../modules/admin/plugins/jquery',
                },
                {
                    src: 'node_modules/admin-lte/dist',
                    dest: '../modules/admin/plugins/admin-lte',
                },
                {
                    src: 'node_modules/select2/dist',
                    dest: '../modules/admin/plugins/select2',
                },
                {
                    src: 'node_modules/sweetalert2/dist',
                    dest: '../modules/admin/plugins/sweetalert2',
                },
                {
                    src: 'node_modules/@fortawesome/fontawesome-free/css',
                    dest: '../modules/admin/plugins/fontawesome-free',
                },
                {
                    src: 'node_modules/@fortawesome/fontawesome-free/webfonts',
                    dest: '../modules/admin/plugins/fontawesome-free',
                },
                {
                    src: 'node_modules/cropperjs',
                    dest: '../modules/admin/plugins',
                },
            ],
        }),
        laravel([
            'resources/js/app.js',
        ]),
    ],
});
