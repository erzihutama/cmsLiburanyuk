<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_tempat_budaya extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T_tempat_budaya_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

      $datat_tempat_budaya=$this->T_tempat_budaya_model->get_all();//panggil ke modell
      $datafield=$this->T_tempat_budaya_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => '{namamodule}/t_tempat_budaya/t_tempat_budaya_list',
        'sidebar'=>'{namamodule}/sidebar',
        'css'=>'{namamodule}/crudassets/css',
        'script'=>'{namamodule}/crudassets/script',
        'datat_tempat_budaya'=>$datat_tempat_budaya,
        'datafield'=>$datafield,
        'module'=>'{namamodule}',
        'titlePage'=>'t_tempat_budaya',
        'controller'=>'t_tempat_budaya'
       );
      $this->template->load($data);
    }


    public function create(){
      $data = array(
        'contain_view' => '{namamodule}/t_tempat_budaya/t_tempat_budaya_form',
        'sidebar'=>'{namamodule}/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'{namamodule}/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'{namamodule}/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'{namamodule}/t_tempat_budaya/create_action',
        'module'=>'{namamodule}',
        'titlePage'=>'t_tempat_budaya',
        'controller'=>'t_tempat_budaya'
       );
      $this->template->load($data);
    }

    public function edit($id){
      $dataedit=$this->T_tempat_budaya_model->get_by_id($id);
      $data = array(
        'contain_view' => '{namamodule}/t_tempat_budaya/t_tempat_budaya_edit',
        'sidebar'=>'{namamodule}/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'{namamodule}/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'{namamodule}/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'{namamodule}/t_tempat_budaya/update_action',
        'dataedit'=>$dataedit,
        'module'=>'{namamodule}',
        'titlePage'=>'t_tempat_budaya',
        'controller'=>'t_tempat_budaya'
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

            $this->T_tempat_budaya_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('{namamodule}/t_tempat_budaya'));
        }
    }



    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_budaya', TRUE));
        } else {
            $data = array(
		'nama_tempat' => $this->input->post('nama_tempat',TRUE),
		'daerah' => $this->input->post('daerah',TRUE),
		'photo' => $this->input->post('photo',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'penilaian' => $this->input->post('penilaian',TRUE),
		'jam' => $this->input->post('jam',TRUE),
	    );

            $this->T_tempat_budaya_model->update($this->input->post('id_budaya', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('{namamodule}/t_tempat_budaya'));
        }
    }

    public function delete($id)
    {
        $row = $this->T_tempat_budaya_model->get_by_id($id);

        if ($row) {
            $this->T_tempat_budaya_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('{namamodule}/t_tempat_budaya'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('{namamodule}/t_tempat_budaya'));
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

	$this->form_validation->set_rules('id_budaya', 'id_budaya', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}