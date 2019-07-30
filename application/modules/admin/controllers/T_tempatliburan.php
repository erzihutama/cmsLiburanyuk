<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_tempatliburan extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T_tempatliburan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

      $datat_tempatliburan=$this->T_tempatliburan_model->get_all();//panggil ke modell
      $datafield=$this->T_tempatliburan_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => 'admin/t_tempatliburan/t_tempatliburan_list',
        'sidebar'=>'admin/sidebar',
        'css'=>'admin/crudassets/css',
        'script'=>'admin/crudassets/script',
        'datat_tempatliburan'=>$datat_tempatliburan,
        'datafield'=>$datafield,
        'module'=>'admin',
        'titlePage'=>'t_tempatliburan',
        'controller'=>'t_tempatliburan'
       );
      $this->template->load($data);
    }


    public function create(){
      $data = array(
        'contain_view' => 'admin/t_tempatliburan/t_tempatliburan_form',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/t_tempatliburan/create_action',
        'module'=>'admin',
        'titlePage'=>'t_tempatliburan',
        'controller'=>'t_tempatliburan'
       );
      $this->template->load($data);
    }

    public function edit($id){
      $dataedit=$this->T_tempatliburan_model->get_by_id($id);
      $data = array(
        'contain_view' => 'admin/t_tempatliburan/t_tempatliburan_edit',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/t_tempatliburan/update_action',
        'dataedit'=>$dataedit,
        'module'=>'admin',
        'titlePage'=>'t_tempatliburan',
        'controller'=>'t_tempatliburan'
       );
      $this->template->load($data);
    }


    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_tempat' => $this->input->post('nama_tempat',TRUE),
		'daerah' => $this->input->post('daerah',TRUE),
		'photo' => $this->input->post('photo',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'penilaian' => $this->input->post('penilaian',TRUE),
		'jam' => $this->input->post('jam',TRUE),
	    );

            $this->T_tempatliburan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/t_tempatliburan'));
        }
    }



    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_liburan', TRUE));
        } else {
            $data = array(
		'nama_tempat' => $this->input->post('nama_tempat',TRUE),
		'daerah' => $this->input->post('daerah',TRUE),
		'photo' => $this->input->post('photo',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'penilaian' => $this->input->post('penilaian',TRUE),
		'jam' => $this->input->post('jam',TRUE),
	    );

            $this->T_tempatliburan_model->update($this->input->post('id_liburan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/t_tempatliburan'));
        }
    }

    public function delete($id)
    {
        $row = $this->T_tempatliburan_model->get_by_id($id);

        if ($row) {
            $this->T_tempatliburan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/t_tempatliburan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/t_tempatliburan'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nama_tempat', 'nama tempat', 'trim|required');
	$this->form_validation->set_rules('daerah', 'daerah', 'trim|required');
	$this->form_validation->set_rules('photo', 'photo', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	$this->form_validation->set_rules('penilaian', 'penilaian', 'trim|required');
	$this->form_validation->set_rules('jam', 'jam', 'trim|required');

	$this->form_validation->set_rules('id_liburan', 'id_liburan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}