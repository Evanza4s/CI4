<?php

namespace App\Controllers;

use App\Models\BeritaModel;

class Berita extends BaseController
{

    public function viewberita($slug)
    {
        $beritaModel = new BeritaModel();

        $berita = $beritaModel->where('slug', $slug)->first();

        if (!$berita) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $data = [
            'berita' => $berita
        ];
        echo view('templates/header', $data);
        return view('berita/index', $data);
        echo view('templates/footer', $data);
    }
    public function index()
    {
        $beritaModel = new BeritaModel();
        $data['berita'] = $beritaModel->findAll();
        helper(['form', 'url']);

        echo view('templates/header', $data);
        echo view('berita/index', $data);
        echo view('templates/footer', $data);
    }

    //--------------------------------------------------------------------

    public function tambah()
    {
        $data = [];
        helper(['form', 'url']);

        $beritaModel = new BeritaModel();

        if ($this->request->getMethod() == 'post') {

            // Set rules for form validation
            $rules = [
                'title' => [
                    'label' => 'Title',
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'min_length' => 'Minimum karakter untuk field {field} adalah 5 karakter'
                    ]
                ],
                'subtitle' => [
                    'label' => 'Subtitle',
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'min_length' => 'Minimum karakter untuk field {field} adalah 5 karakter',
                    ]
                ],
                'writer' => [
                    'label' => 'Writer',
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'min_length' => 'Minimum karakter untuk field {field} adalah 5 karakter'
                    ]
                ],
                'image' => [
                    'rules' => 'uploaded[image]|max_size[image,1024]|is_image[image]',
                    'errors' => [
                        'uploaded' => 'Harus memilih gambar',
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Format file tidak sesuai, hanya diperbolehkan gambar'
                    ]
                ],
                'content' => [
                    'label' => 'Content',
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'min_length' => 'Minimum karakter untuk field {field} adalah 5 karakter'
                    ]
                ],
                'status' => [
                    'label' => 'Status',
                    'rules' => 'required|in_list[active,inactive, completed, scheduled, pending]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'in_list' => '{field} harus diisi dengan "active", "inactive", "complete", "scheduled", or "pending"'
                    ]
                ],
            ];

            $validation = \Config\Services::validation();
            $validation->setRules($rules);

            if (!$validation->withRequest($this->request)->run()) {
                // If validation fails, show errors to user
                $data['validation'] = $validation;
            } else {
                // If validation passes, save data and upload image
                $file = $this->request->getFile('image');
                if ($file->isValid() && !$file->hasMoved()) {
                    $imageName = $file->getRandomName();
                    $file->move(WRITEPATH . 'uploads/', $imageName);
                } else {
                    // If image upload fails, set image name to empty string
                    $imageName = '';
                }

                $newData = [
                    'title' => $this->request->getVar('title'),
                    'subtitle' => $this->request->getVar('subtitle'),
                    'writer' => $this->request->getVar('writer'),
                    'image' => $imageName,
                    'content' => $this->request->getVar('content'),
                    'status' => $this->request->getVar('status')
                ];

                $beritaModel->save($newData);

                $session = session();
                $session->setFlashdata('success', 'Successful Upload');

                // Redirect to another page after data is uploaded
                return redirect()->to('berita');
            }
        }

        echo view('templates/header', $data);
        echo view('berita/tambah', $data);
        echo view('templates/footer', $data);
    }
    public function edit($id)
    {
        helper('form');

        $beritaModel = new BeritaModel();
        $berita = $beritaModel->find($id);

        if (!$berita) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data dengan id ' . $id . ' tidak ditemukan.');
        }

        $data = [
            'berita' => $berita
        ];

        echo view('templates/header');
        echo view('berita/edit', $data);
        echo view('templates/footer');
    }

    public function update($id)
    {
        helper('form');

        $beritaModel = new BeritaModel();
        $berita = $beritaModel->find($id);

        if (!$berita) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data dengan id ' . $id . ' tidak ditemukan.');
        }

        $rules = [
            'title' => 'required',
            'subtitle' => 'required',
            'writer' => 'required',
            'content' => 'required',
            'status' => 'required'
        ];

        if (!$this->validate($rules)) {
            $data = [
                'berita' => $berita,
                'validation' => $this->validator
            ];

            echo view('templates/header');
            echo view('berita/edit', $data);
            echo view('templates/footer');
        } else {
            // Update data
            $data = [
                'title' => $this->request->getPost('title'),
                'subtitle' => $this->request->getPost('subtitle'),
                'writer' => $this->request->getPost('writer'),
                'content' => $this->request->getPost('content'),
                'status' => $this->request->getPost('status')
            ];

            // Upload gambar jika ada
            $file = $this->request->getFile('image');
            if ($file->isValid()) {
                $imageName = $file->getRandomName();
                $file->move(WRITEPATH . 'uploads/', $imageName);
                $data['image'] = $imageName;
                // Tampilkan pesan berhasil
                session()->setFlashdata('success', 'Gambar berhasil diupload.');
            } else {
                $data['image'] = '';
                // Tampilkan pesan error
                session()->setFlashdata('error', 'Gambar gagal diupload.');
            }

            // Tambahkan update timestamp
            $data['updated_at'] = date('Y-m-d H:i:s');

            // Update data ke dalam database
            $update = $beritaModel->update($id, $data);

            if ($update) {
                session()->setFlashdata('success', 'Post has been updated successfully');
                return redirect()->to(base_url('berita'));
            } else {
                session()->setFlashdata('error', 'Some problems occured, please try again.');
                return redirect()->back();
            }
        }
    }

    public function delete($id)
    {
        $beritaModel = new BeritaModel();
        $berita = $beritaModel->find($id);

        // Jika data tidak ditemukan, tampilkan halaman 404
        if (!$berita) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data dengan id ' . $id . ' tidak ditemukan.');
        }

        $result = $beritaModel->delete($id);

        if ($result) {
            session()->setFlashdata('message', 'Delete Data Berhasil');
        } else {
            session()->setFlashdata('message', 'Delete Data Gagal');
        }

        return redirect()->to('/berita');
    }
}
