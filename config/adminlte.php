<?php

return [

    // ... (konfigurasi lain di atas, biarkan default)

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        // Navbar items:
        [
            'type'         => 'navbar-search',
            'text'         => 'search',
            'topnav_right' => true,
        ],
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Sidebar items:
        [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],
        [
            'text'        => 'Dashboard',
            'url'         => 'admin/dashboard', // Ganti dengan URL atau rute Anda
            'icon'        => 'fas fa-fw fa-tachometer-alt',
        ],
        ['header' => 'PENGELOLAAN TOKO'],
        [
            'text' => 'Manajemen Produk',
            'route'  => 'admin.products.index',
            'icon' => 'fas fa-fw fa-box-open',
        ],
        [
            'text'    => 'Pesanan',
            'icon'    => 'fas fa-fw fa-shopping-cart',
            'label'   => 4, // Contoh notifikasi
            'label_color' => 'success',
        ],
        // ['header' => 'PENGATURAN AKUN'],
        // [
        //     'text' => 'Profil',
        //     'url'  => '#', // Ganti dengan rute profil admin nanti
        //     'icon' => 'fas fa-fw fa-user',
        // ],
        // [
        //     'text' => 'Ubah Password',
        //     'url'  => '#', // Ganti dengan rute ubah password nanti
        //     'icon' => 'fas fa-fw fa-lock',
        // ],
    ],

    // ... (konfigurasi lain di bawah)

];
