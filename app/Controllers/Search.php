<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\KisahModel;

class Search extends BaseController
{
    public function index()
    {
        $searchQuery = $this->request->getGet('search_query');
        $data['searchQuery'] = $searchQuery;

        if (!empty($searchQuery)) { // tambahkan pengecekan apakah $searchQuery kosong atau tidak
            $beritaModel = new BeritaModel();
            $kisahModel = new KisahModel();

            $data['berita'] = $beritaModel->search($searchQuery);
            $data['kisah'] = $kisahModel->search($searchQuery);
        } else {
            $data['berita'] = array();
            $data['kisah'] = array();
        }

        echo view('templates/header', $data);
        return view('search_view', $data);
        echo view('templates/footer', $data);
    }
}
