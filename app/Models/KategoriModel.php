<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'tbl_category';
    protected $primaryKey = 'kd_category';
    protected $allowedFields = ['category'];


    public function getKategori($kd_category = false)
    {
        if ($kd_category == false) {

            return $this->findAll();
        }
        return $this->where(['kd_category' => $kd_category])->first();
    }
}
