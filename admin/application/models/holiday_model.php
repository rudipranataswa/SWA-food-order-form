<?php
class Holiday_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_holiday($slug = FALSE)
    {
        if ($slug === FALSE) {
                $query = $this->db->get('holiday');
                return $query->result_array();
        }

        $query = $this->db->get_where('holiday', array('id' => $slug));
        return $query->row_array();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('holiday', ['id' => $id])->row_array();
    }

    public function add_holiday_data()
    {
        $data = [
            "date" => $this->input->post('date', true),
            "description" => $this->input->post('description', true)
        ];

        $this->db->insert('holiday', $data);
    }

    public function edit_holiday_data()
    {
        $data = array(
            'date' => $this->input->post('date'),
            'description' => $this->input->post('description')
        );
    }

}