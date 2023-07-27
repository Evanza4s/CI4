<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table = 'berita';
    protected $primaryKey = 'id';
    protected $returntype = 'object';
    protected $useTimestamp = true;
    protected $allowedFields = ['slug', 'title', 'subtitle', 'writer', 'image', 'content', 'status', 'updated_at'];

    public function up()
    {
        $this->forge->addColumn('berita', [
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'after' => 'status'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('berita', 'updated_at');
    }
    public function search($searchQuery)
    {
        $query = $this->table('berita')
            ->like('title', $searchQuery)
            ->orLike('status', $searchQuery)
            ->get();

        return $query->getResultArray();
    }
}
