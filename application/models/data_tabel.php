<?php

class data_tabel extends CI_Model
{
    private $_table1 = "barang";

    public $id_barang;
    public $nama_barang;
    public $harga_barang;
    public $stok;
    public $id_kategori;

    public function rules()
    {
        return [
            [
                'field' => 'nama_barang',
                'label' => 'Nama barang',
                'rules' => 'required'
            ],

            [
                'field' => 'harga_barang',
                'label' => 'Harga barang',
                'rules' => 'numeric'
            ],

            [
                'field' => 'stok',
                'label' => 'Stok total',
                'rules' => 'numeric'
            ]
        ];
    }

    function get_kategori()
    { //ambil data kategori dari table kategori
        $hsl = $this->db->get('kategori');
        return $hsl;
    }

    function tampil_barang()
    {
        // $this->datatables->select('*');
        // $this->datatables->from('barang');
        // $this->datatables->join('kategori', 'kategori.id_kategori=barang.id_kategori');
        // $this->datatables->add_column('view', '<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-kode="$1" data-nama="$2" data-harga="$3" data-kategori="$4">Edit</a>  <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-kode="$1">Hapus</a>', 'id_barang, nama_barang, harga_barang, stok, id_kategori');
        // return $this->datatables->generate();

        // $this->db->order_by('id_barang', 'ASC');
        // return $this->db->from('barang')
        //     ->join('kategori', 'kategori.id_kategori=barang.id_kategori')
        //     ->get()
        //     ->result();

        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.id_kategori=barang.id_kategori');
        $query = $this->db->get();
        return $query->result();

        // $this->db->select("*");
        // $this->db->from('barang');
        // $this->db->join('kategori', 'kategori.id_kategori=barang.id_kategori');
        // if ($query != '') {
        //     $this->db->like('id_barang', $query);
        //     $this->db->or_like('nama_barang', $query);
        //     $this->db->or_like('harga_barang', $query);
        //     $this->db->or_like('stok', $query);
        //     $this->db->or_like('name_kategori', $query);
        // }
        // $this->db->order_by('id_barang', 'DESC');
        // return $this->db->get();
    }

    // public function getById($id_barang)
    // {
    //     return $this->db->get_where($this->_table1, ["id_barang" => $id_barang])->row();
    // }

    // public function update()
    // {
    //     $post = $this->input->post();
    //     $this->id_barang = $post["id_barang"];
    //     $this->nama_barang = $post["nama_barang"];
    //     $this->harga_barang = $post["harga_barang"];
    //     $this->id_kategori = $post["id_kategori"];
    //     return $this->db->update($this->_table1, $this, array('id_barang' => $post['id_barang']));
    // }

    // public function delete($id_barang)
    // {
    //     return $this->db->delete($this->_table1, array("id_barang" => $id_barang));
    // }

    function tampil_barang_masuk()
    {
        $this->db->select('*');
        $this->db->from('stokingbarang');
        $this->db->join('barang', 'stokingbarang.id_barang=barang.id_barang');
        $this->db->join('employee', 'stokingbarang.id_employee=employee.id_employee');

        $query = $this->db->get();
        return $query->result();
    }

    function tampil_barang_keluar()
    {
        $this->db->select('*');
        $this->db->from('ambilbarang');
        $this->db->join('barang', 'ambilbarang.id_barang=barang.id_barang');
        $this->db->join('employee', 'ambilbarang.id_employee=employee.id_employee');

        $query = $this->db->get();
        return $query->result();
    }

    function tampil_barang_hilang()
    {
        $this->db->select('*');
        $this->db->from('baranghilang');
        $this->db->join('kamar', 'baranghilang.no_kamar=kamar.no_kamar');
        $this->db->join('barang', 'baranghilang.id_barang=barang.id_barang');
        $this->db->join('employee', 'baranghilang.id_employee=employee.id_employee');

        $query = $this->db->get();
        return $query->result();
    }
}
