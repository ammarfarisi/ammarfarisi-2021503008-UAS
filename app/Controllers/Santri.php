<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\models\SantriModel;

class Santri extends BaseController
{
    protected $pm;
    private $menu;
    private $rules;
    public function __construct()
    {
        $this->pm = new SantriModel();

        $this->menu = [
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
                'aktif' => 'active',
            ],
        ];

        $this->rules = [			
            'id_santri' => [
                'rules' => 'required',
                'errors' =>[
                    'required' => 'ID Santri tidak boleh kosong',
                ]
            ],
            'nis' => [
                'rules' => 'required',
                'errors' =>[
                    'required' => 'NIS tidak boleh kosong',
                ]
            ],
            'nama_santri' => [
                'rules' => 'required',
                'errors' =>[
                    'required' => 'Nama Santri tidak boleh kosong',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' =>[
                    'required' => 'alamat tidak boleh kosong',
                ]
            ],
            'asrama' => [
                'rules' => 'required',
                'errors' =>[
                    'required' => 'asrama tidak boleh kosong',
                ]
            ],
            'tahun_mondok' => [
                'rules' => 'required',
                'errors' =>[
                    'required' => 'Tahun Mondok tidak boleh kosong',
                ]
            ],
        ];
    }

    public function index()
    {
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">santri</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                                <li class="breadcrumb-item active">santri</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "data santri";

        $query = $this->pm->Find();
        $data['data_santri'] = $query;
        return view('santri/content', $data);
    }

    public function tambah()
    {
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">santri</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                                <li class="breadcrumb-item"><a href="' . base_url() . '/santri">santri</a></li>
                                <li class="breadcrumb-item active">Tambah santri</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Tambah santri';
        $data['action'] = base_url() . '/santri/simpan';
        return view('santri/input', $data);
    }

    public function simpan()
    {
        
        if (strtolower($this->request->getmethod()) !== 'post') {

            return redirect()->back()->withInput();
        }
        if (!$this->validate($this->rules)) {
            return redirect()->back()->withInput();
        }
 
        $dt = $this->request->getPost();
        try{
            $simpan = $this->pm->insert($dt);        
            return redirect()->to('santri')->with('success', 'data berhasil disimpan');

        } catch(\codeIgniter\Database\Exceptions\DatabaseException $e){

            session()->setflashdata('error', $e->getmessage());
            return redirect()->back()->withinput();
        }
    }

    public function hapus($id){
        if(empty($id)){
            return redirect()->back()->with('error', 'hapus data gagal dilakukan');
        }

        try{
            $this->pm->delete($id);
            return redirect()->to('santri')->with('success', 'data santri dengan kode'.$id.'berhasil dihapus');
        } catch (\codeIgniter\Database\Exceptions\DatabaseException $e){
            return redirect()->to('santri')->with('error',$e->getmessage());
        }
    }

    public function edit($id){
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">santri</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                                <li class="breadcrumb-item"><a href="' . base_url() . '/santri">santri</a></li>
                                <li class="breadcrumb-item active">Edit santri</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Edit santri';
        $data['action'] = base_url() . '/santri/update';

        $data['edit_data'] = $this->pm->find($id);
        return view('santri/input', $data);
    }

    public function update(){
        $dtEdit = $this->request->getPost();
        $param = $dtEdit['param'];
        unset($dtEdit['param']);

        if (strtolower($this->request->getmethod()) !== 'post') {

            return redirect()->back()->withInput();
        }
        try {
            $this->pm->update($param, $dtEdit);
            return redirect()->to('santri')->with('success','Data Berhasil Diupdate');
        } catch (\codeIgniter\Database\Exceptions\DatabaseException $e) {
            session()->setFlashdata('error',$e->getmessage());
            return redirect()->back()->withInput();
        }

    }
}
