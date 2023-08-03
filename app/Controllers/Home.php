<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $menu = [
            'Beranda' => [
                'title' => 'Beranda',
                'link' => base_url(),
                'icon' => 'fa-solid fa-house',
                'aktif' => '',
            ],
            'Petugas' => [
                'title' => 'Petugas',
                'link' => base_url() . '/petugas',
                'icon' => 'fa-solid fa-users',
                'aktif' => '',
            ],
            'Semester' => [
                'title' => 'Semester',
                'link' => base_url() . '/semester',
                'icon' => 'fa-solid fa-list',
                'aktif' => '',
            ],
            'Santri' => [
                'title' => 'Santri',
                'link' => base_url() . '/santri',
                'icon' => 'fa-solid fa-user',
                'aktif' => '',
            ],
        ];

        $breadcrumb = '<div class="col-sm-12">
                            <h1 class="m-0">Beranda</h1>
                        </div>
                        <div class="col-sm-12">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Beranda</li>
                            </ol>
                        </div>';
        $data['menu'] = $menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "welcome to my website";
        $data['selamat_datang'] = "selamat datang di aplikasi sederhana";
        return view('tamplate/content', $data);
    }
}
