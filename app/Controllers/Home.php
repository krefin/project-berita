<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\KategoriModel;

class Home extends BaseController
{
    protected $beritaModel;
    protected $kategoriModel;
    public function __construct()
    {
        session();
        $this->beritaModel = new BeritaModel();
        $this->kategoriModel = new KategoriModel();
    }
    public function index()
    {
        if (logged_in()) {
            $data = [
                'home' => 'Home',
                'data' => 'Dashboard',
                'judul' => 'Dashboard',
                'validation' => \Config\Services::validation(),
                'berita' => $this->beritaModel->getBerita(),
                'kategori' => $this->kategoriModel->getKategori()
            ];
            return view('dashboard', $data);
        }
        $data = [
            'berita' => $this->beritaModel->getBerita(),
            'kategori' => $this->kategoriModel->getKategori()
        ];
        return view('index', $data);
    }
    public function single($kd_content)
    {
        $data = [
            'berita' => $this->beritaModel->getBerita($kd_content),
            'kategori' => $this->kategoriModel->getKategori()
        ];
        return view('single', $data);
    }
    public function berita()
    {
        $data = [
            'home' => 'Home',
            'data' => 'Data',
            'judul' => 'Berita',
            'berita' => $this->beritaModel->getBerita()
        ];
        return view('berita', $data);
    }
    public function tambahBerita()
    {
        // Validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul harus diisi!'
                ],
            ],
            'isi_berita' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi Berita harus diisi!'
                ],
            ],
            'category' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori Berita harus dipilih!'
                ],
            ],
            'img' => [
                'rules' => 'uploaded[img]|max_size[img,1024]|is_image[img]|mime_in[img,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Harap Upload gambar!',
                    'max_size' => 'Ukuran gambar terlalu besar!',
                    'is_image' => 'Yang diupload bukan sebuah gambar!',
                    'mime_in' => 'Yang diupload bukan sebuah gambar!'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // dd($validation);
            // return redirect()->to('/Home')->withInput()->with('validation', $validation);
            return redirect()->to('/Home')->withInput();
        }
        $fileGambar = $this->request->getFile('img');
        $namaGambar = $fileGambar->getRandomName();
        $fileGambar->move('assets/img/berita', $namaGambar);
        $this->beritaModel->save([
            'judul' => $this->request->getVar('judul'),
            'isi_berita' => $this->request->getVar('isi_berita'),
            'category' => $this->request->getVar('category'),
            'img' => $namaGambar
        ]);
        return redirect()->to('/Home/berita');
    }
    public function deleteBerita($kd_content)
    {
        $berita = $this->beritaModel->find($kd_content);

        $this->beritaModel->delete($kd_content);
        unlink('assets/img/berita/' . $berita['img']);
        session()->setFlashdata('pesan', 'Berita berhasil dihapus!');
        return redirect()->back();
    }
    public function editBerita($kd_content)
    {
        $data = [
            'home' => 'Home',
            'data' => 'Data',
            'judul' => 'Edit Berita',
            'berita' => $this->beritaModel->getBerita($kd_content),
            'kategori' => $this->kategoriModel->getKategori()
        ];
        return view('editberita', $data);
    }
    public function update($kd_content)
    {
        // Validasi input
        if (!$this->validate([
            'img' => [
                'rules' => 'max_size[img,1024]|is_image[img]|mime_in[img,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar!',
                    'is_image' => 'Yang diupload bukan sebuah gambar!',
                    'mime_in' => 'Yang diupload bukan sebuah gambar!'
                ]
            ]
        ])) {
            return redirect()->to('/Home/editBerita')->withInput();
        }
        $fileGambar = $this->request->getFile('img');
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('assets/img/berita', $namaGambar);
            unlink('assets/img/berita/' . $this->request->getVar('gambarLama'));
        }
        $this->beritaModel->save([
            'kd_content' => $kd_content,
            'judul' => $this->request->getVar('judul'),
            'isi_berita' => $this->request->getVar('isi_berita'),
            'category' => $this->request->getVar('category'),
            'img' => $namaGambar
        ]);
        return redirect()->to('/Home/berita');
    }
    public function kategori()
    {
        $data = [
            'home' => 'Home',
            'data' => 'Data',
            'judul' => 'Kategori',
            'kategori' => $this->kategoriModel->getKategori()
        ];
        return view('kategori', $data);
    }
    public function sortKategori($category)
    {
        $data = [
            'berita' => $this->beritaModel->getBerita(),
            'kategori' => $this->kategoriModel->getKategori(),
            'sort' => $this->beritaModel->getKate($category)
        ];
        return view('sort', $data);
    }
    public function deleteKategori($kd_category)
    {

        $this->kategoriModel->delete($kd_category);
        session()->setFlashdata('pesan', 'Berita berhasil dihapus!');
        return redirect()->to('/Home/kategori');
    }
    public function tambahKategori()
    {
        $data = [
            'home' => 'Home',
            'data' => 'Data',
            'judul' => 'Tambah Kategori'
        ];
        return view('tambahkategori', $data);
    }
    public function saveKate()
    {
        // Validasi input
        if (!$this->validate([
            'category' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori harus diisi!'
                ]
            ]

        ])) {

            return redirect()->back()->withInput();
        }
        $this->kategoriModel->save([
            'category' => $this->request->getVar('category')
        ]);
        return redirect()->to('/Home/kategori');
    }
    public function editKategori($kd_category)
    {
        $data = [
            'home' => 'Home',
            'data' => 'Data',
            'judul' => 'Edit Kategori',
            'kategori' => $this->kategoriModel->getKategori($kd_category)
        ];
        return view('editkategori', $data);
    }

    public function updateKate($kd_category)
    {

        $this->kategoriModel->save([
            'kd_category' => $kd_category,
            'category' => $this->request->getVar('category')
        ]);
        return redirect()->to('/Home/kategori');
    }



    public function search()
    {
        $keywords = $this->request->getVar('search');
        if ($keywords) {
            $search = $this->beritaModel->getSearch($keywords);
        } else {
            $search = $this->beritaModel->getBerita();
        }
        $data = [
            'berita' => $search,
            'kategori' => $this->kategoriModel->getKategori()
        ];
        return view('search', $data);
    }
    public function profile()
    {
        $data = [
            'home' => 'Home',
            'data' => 'User',
            'judul' => 'Profile',

        ];
        return view('profile', $data);
    }
}
