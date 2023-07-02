<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table = 'tbl_content';
    protected $primaryKey = 'kd_content';
    protected $allowedFields = ['judul', 'isi_berita', 'category', 'img'];
    protected $useTimestamps = true;

    public function getBerita($kd_content = false)
    {
        if ($kd_content == false) {

            return $this->orderBy('kd_content', 'DESC')->findAll();
        }
        return $this->where(['kd_content' => $kd_content])->first();
    }
    public function getKate($category)
    {
        return $this->where(['category' => $category])->findAll();
    }
    public function getSearch($keywords)
    {
        return $this->like('judul', $keywords)->findAll();
    }
}
