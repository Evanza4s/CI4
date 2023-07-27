<?php

namespace App\Models;

use CodeIgniter\Model;

class KisahModel extends Model
{
    protected $table = 'kisah';
    protected $primaryKey = 'id';
    protected $returntype = 'object';
    protected $useTimestamp = true;
    protected $allowedFields = ['slug', 'title', 'subtitle', 'writer', 'image', 'content', 'status', 'updated_at'];

    public function up()
    {
        $this->forge->addColumn('kisah', [
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'after' => 'status'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('kisah', 'updated_at');
    }
    public function search($searchQuery)
    {
        $query = $this->table('kisah')
            ->like('title', $searchQuery)
            ->orLike('status', $searchQuery)
            ->get();

        return $query->getResultArray();
    }
}
