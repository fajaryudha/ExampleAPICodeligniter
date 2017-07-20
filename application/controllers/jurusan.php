<?php
 
require APPPATH . '/libraries/REST_Controller.php';
 
class jurusan extends REST_Controller {
 
    function __construct() {
        parent::__construct();
    }
    
    // show data mahasiswa
    function index_get() {
        $id_jurusan = $this->get('id_jurusan');
        if ($id_jurusan == '') {
            $jurusan = $this->db->get('jurusan')->result();
        } else {
            $this->db->where('id_jurusan', $id_jurusan);
            $jurusan = $this->db->get('jurusan')->result();
        }
        $this->response($jurusan, 200);
    }
 
    // insert new data to mahasiswa
    function index_post() {
        $data = array(
                    'id_jurusan'           => $this->post('id_jurusan'),
                    'nama_jurusan'          => $this->post('nama_jurusan'));
        $insert = $this->db->insert('jurusan', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
 
    // update data mahasiswa
    function index_put() {
        $id_jurusan = $this->put('id_jurusan');
        $data = array(
                    'id_jurusan'       => $this->put('id_jurusan'),
                    'nama_jurusan'      => $this->put('nama_jurusan'));
        $this->db->where('id_jurusan', $id_jurusan);
        $update = $this->db->update('jurusan', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
 
    // delete mahasiswa
    function index_delete() {
        $id_jurusan = $this->delete('id_jurusan');
        $this->db->where('id_jurusan', $id_jurusan);
        $delete = $this->db->delete('jurusan');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
 
}