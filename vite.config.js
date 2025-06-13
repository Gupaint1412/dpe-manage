import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/bootstrap.js',                
                'public/tailadmin-free-tailwind-dashboard-template-main/src/css/style.css', // ถ้ามีไฟล์ CSS หลักของ TailAdmin
                'public/tailadmin-free-tailwind-dashboard-template-main/src/js/index.js', // ถ้ามีไฟล์ JS หลักของ TailAdmin
            ],
            refresh: true,
        }),
    ],
});
