<?php

namespace App\Models;

use CodeIgniter\Model;

class Berita2Model extends Model
{
    protected $table = 'berita';
}

class Kisah2Model extends Model
{
    protected $table = 'kisah';

    public function search($searchQuery)
    {
        $query = $this->table('kisah')
            ->like('title', $searchQuery)
            ->orLike('status', $searchQuery)
            ->get();

        return $query->getResultArray();
    }
}
