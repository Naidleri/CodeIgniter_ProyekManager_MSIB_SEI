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
        $this->http_request('http://localhost:8080/lokasi', 'POST', $data);
        redirect('/');
    }

    public function add_proyek() {
        $url_lokasi = 'http://localhost:8080/lokasi';
        $data['lokasi'] = json_decode($this->http_request($url_lokasi));
        $this->load->view('add_proyek', $data);
    }

    public function save_proyek() {
        $data = $this->input->post();
        $data['lokasiList'] = array_map(function($id) {
            return ['id' => $id];
        }, $data['lokasi']);
        unset($data['lokasi']);
        $this->http_request('http://localhost:8080/proyek', 'POST', $data);
        redirect('/');
    }

    public function edit_lokasi($id) {
        $data['lokasi'] = json_decode($this->http_request('http://localhost:8080/lokasi/' . $id));
        $this->load->view('edit_lokasi_view', $data);
    }

    public function update_lokasi($id) {
        $data = $this->input->post();
        $this->http_request('http://localhost:8080/lokasi/' . $id, 'PUT', $data);
        redirect('home');
    }

    public function edit_proyek($id) {
        $data['proyek'] = json_decode($this->http_request('http://localhost:8080/proyek/' . $id));
        $this->load->view('edit_proyek_view', $data);
    }

    public function update_proyek($id) {
        $data = $this->input->post();
        $data['lokasiList'] = array_map(function($id) {
            return ['id' => $id];
        }, $data['lokasi']);
        unset($data['lokasi']);
        $this->http_request('http://localhost:8080/proyek/' . $id, 'PUT', $data);
        redirect('home');
    }

    public function delete_lokasi($id) {
        $this->http_request('http://localhost:8080/lokasi/' . $id, 'DELETE');
        redirect('home');
    }

    public function delete_proyek($id) {
        $this->http_request('http://localhost:8080/proyek/' . $id, 'DELETE');
        redirect('home');
    }
}
