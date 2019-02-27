<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CommonModel extends CI_Model {
	public function insert($tableName,$data)
	{
		$sql=$this->db->insert($tableName,$data);
		return $sql;
	}

	public function see_articles($limit,$offset)
	{
	$sql=$this->db->select('*')
	              ->from('insert_table')
	              ->limit($limit,$offset)
	              ->get()
	              ->result();
	$received= json_decode(json_encode($sql), True);
	return $received;
	}

	public function update($tablename, $data, $whereCondition) {
		$this->db->set($data);   
		$this->db->where($whereCondition); 
		$sql = $this->db->update($tablename); 
		return $sql;
	}

	public function delete($tablename,$whereCondition) {   
		$this->db->where($whereCondition); 
		$sql = $this->db->delete($tablename); 
		return $sql;
	}
}
