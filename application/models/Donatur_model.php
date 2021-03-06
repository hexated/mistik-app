<?php

class Donatur_model extends CI_model
{
    public function getAllDonatur()
    {   
        $query = $this->db->query("SELECT * FROM donatur ORDER BY id_donatur DESC")->result_array();
        return $query;
    }

    public function tambahDataDonatur()
    {
        $data = [

            "nama_lengkap" => $this->input->post('nama-lengkap', true),
            "username" => $this->input->post('username', true),
            "email" => $this->input->post('email', true),
            "password" => md5($this->input->post('password', true)),
            "alamat" => $this->input->post('alamat', true),
            "no_telepon" => $this->input->post('notelp', true)

        ];

        $this->db->insert('donatur', $data);
    }

    public function hapusDataDonatur($id)
    {
        $this->db->delete('donatur', array('id_donatur' => $id));
    }

    public function editDataDonatur($id)
    {
        $data = [

            "nama_lengkap" => $this->input->post('nama-lengkap', true),
            "alamat" => $this->input->post('alamat', true),
            "no_telepon" => $this->input->post('notelp', true)

        ];

        $this->db->where('id_donatur', $id);
        $this->db->update('donatur', $data);

    }

}
