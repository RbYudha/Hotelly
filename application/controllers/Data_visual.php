<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_visual extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dynamic_chart_model');
    }

    function index()
    {
        $data['employee'] = $this->db->get_where('employee', ['email_employee' =>
        $this->session->userdata('email_employee')])->row_array();

        //$data1['year_list'] = $this->dynamic_chart_model->fetch_year();
        // $this->load->view('dynamic_chart', $data);

        //$data1['id_kategori'] = $this->dynamic_chart_model->fetch_total_barang();

        $this->load->view('templates/header', $data);
        $this->load->view('manajer_view/graph_total_barang');
    }

    function graph_stok_barang()
    {
        $data['employee'] = $this->db->get_where('employee', ['email_employee' =>
        $this->session->userdata('email_employee')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('manajer_view/graph_barang_masuk');
    }

    function graph_harga_barang()
    {
        $data['employee'] = $this->db->get_where('employee', ['email_employee' =>
        $this->session->userdata('email_employee')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('manajer_view/graph_harga_barang');
    }

    function graph_ambil_barang()
    {
        $data['employee'] = $this->db->get_where('employee', ['email_employee' =>
        $this->session->userdata('email_employee')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('manajer_view/graph_barang_keluar');
    }

    function graph_barang_hilang()
    {
        $data['employee'] = $this->db->get_where('employee', ['email_employee' =>
        $this->session->userdata('email_employee')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('manajer_view/graph_barang_hilang');
    }

    function graph_barang_hilang2()
    {
        $data['employee'] = $this->db->get_where('employee', ['email_employee' =>
        $this->session->userdata('email_employee')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('manajer_view/graph_barang_hilang2');
    }


    // function fetch_idkategori()
    // {
    //     if ($this->input->post('id_kategori')) {
    //         $barang = $this->dynamic_chart_model->fetch_chart_idkategori($this->input->post('id_kategori'));

    //         foreach ($barang->result_array() as $row) {
    //             $output[] = array(
    //                 'nama_barang'  => $row["nama_barang"],
    //                 'stok' => floatval($row["stok"])
    //             );
    //         }
    //         echo json_encode($output);
    //     }
    // }

    // function fetch_data()
    // {
    //     if ($this->input->post('year')) {
    //         $chart_data = $this->dynamic_chart_model->fetch_chart_data($this->input->post('year'));

    //         foreach ($chart_data->result_array() as $row) {
    //             $output[] = array(
    //                 'month'  => $row["month"],
    //                 'profit' => floatval($row["profit"])
    //             );
    //         }
    //         echo json_encode($output);
    //     }
    // }
}
