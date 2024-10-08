<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProyekController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index() {
        $url_proyek = 'http://localhost:8080/proyek';
        $url_lokasi = 'http://localhost:8080/lokasi';

        $data['proyek'] = json_decode($this->http_request($url_proyek));
        $data['lokasi'] = json_decode($this->http_request($url_lokasi));
        $data['error'] = $this->input->get('error');

        $this->load->view('home_view', $data);
    }

    private function http_request($url, $method = 'GET', $data = null) {
        $options = [
            'http' => [
                'method' => $method,
                'header' => 'Content-Type: application/json',
            ]
        ];

        if ($data !== null) {
            $options['http']['content'] = json_encode($data);
        }

        $context = stream_context_create($options);
        return file_get_contents($url, false, $context);
    }

    public function add_lokasi() {
        $this->load->view('add_lokasi');
    }

    public function save_lokasi() {
        $data = $this->input->post();
        $response = $this->http_request('http://localhost:8080/lokasi', 'POST', $data);
        if ($response === false) {
            redirect('/?error=Gagal menambahkan lokasi. Coba lagi.');
        }
        redirect('/');
    }

    public function add_proyek() {
        $url_lokasi = 'http://localhost:8080/lokasi';
        $data['lokasi'] = json_decode($this->http_request($url_lokasi));
        $this->load->view('add_proyek', $data);
    }

    public function save_proyek() {
        $data = $this->input->post();
        if (isset($data['lokasi']) && !empty($data['lokasi'])) {
            $data['lokasiList'] = [['id' => $data['lokasi']]];
        }
        unset($data['lokasi']);
        $response = $this->http_request('http://localhost:8080/proyek', 'POST', $data);
        if ($response === false) {
            redirect('/?error=Gagal menambahkan proyek. Coba lagi.');
        }
        redirect('/');
    }
    
    public function edit_lokasi($id) {
        $all_lokasi = json_decode($this->http_request('http://localhost:8080/lokasi'));
        $data['lokasi'] = array_filter($all_lokasi, function($l) use ($id) {
            return $l->id == $id;
        });
        if (empty($data['lokasi'])) {
            show_404();
        }
        $data['lokasi'] = array_values($data['lokasi'])[0]; 
        $this->load->view('edit_lokasi', $data);
    }

    public function update_lokasi($id) {
        $data = $this->input->post();
        $response = $this->http_request('http://localhost:8080/lokasi/' . $id, 'PUT', $data);
        if ($response === false) {
            redirect('/?error=Gagal memperbarui lokasi. Coba lagi.');
        }
        redirect('/');
    }

    public function edit_proyek($id) {
        $all_proyek = json_decode($this->http_request('http://localhost:8080/proyek'));
        $data['proyek'] = array_filter($all_proyek, function($p) use ($id) {
            return $p->id == $id;
        });
        
        if (empty($data['proyek'])) {
            show_404();
        }
        
        $data['proyek'] = array_values($data['proyek'])[0];
        
        $data['lokasi'] = json_decode($this->http_request('http://localhost:8080/lokasi'));
        
        $this->load->view('edit_proyek', $data);
    }
    
    public function update_proyek($id) {
        $data = $this->input->post();
        $response = $this->http_request('http://localhost:8080/proyek/' . $id, 'PUT', $data);
        if ($response === false) {
            redirect('/?error=Gagal memperbarui proyek. Coba lagi.');
        }
        redirect('/');
    }

    public function delete_lokasi($id) {
        $response = $this->http_request('http://localhost:8080/lokasi/' . $id, 'DELETE');
        if ($response === false) {
            redirect('/?error=Gagal menghapus lokasi. Coba lagi.');
        }
        redirect('/');
    }

    public function delete_proyek($id) {
        $response = $this->http_request('http://localhost:8080/proyek/' . $id, 'DELETE');
        if ($response === false) {
            redirect('/?error=Gagal menghapus proyek. Coba lagi.');
        }
        redirect('/');
    }
}
