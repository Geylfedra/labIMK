<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class GeneralModel extends CI_Model
{

  function get_general($table)
  {
    $query = $this->db->get($table);
    return $query->result();
  }

  function get_general_group_by($table,$group_by)
  {
    $query = $this->db->query("SELECT * FROM $table GROUP BY $group_by");
    return $query->result();
  }

  function get_general_order_by($table,$by,$order)
  {
    return $query = $this->db->query("SELECT * FROM $table ORDER BY $by $order")->result();
  }

  function get_by_id_general_order_by($table,$id,$val,$by,$order)
  {
    return $query = $this->db->query("SELECT * FROM $table WHERE $id = $val ORDER BY $by $order")->result();
  }

  function truncate_general($table)
  {
    return $this->db->query("TRUNCATE TABLE $table");
  }

  function count_general($table)
  {
    return $this->db->query("SELECT COUNT(*) as jumlah FROM $table")->row();
  }

  function count_by_id_general($table, $id, $val)
  {
    return $this->db->query("SELECT COUNT(*) as jumlah FROM $table WHERE $id = '$val'")->row();
  }

  function get_by_id_general($table, $id, $val)
  {
    $query = $this->db->where($id, $val)->get($table);
    return $query->result();
  }

  function create_general($table, $data)
  {
    return $this->db->insert($table, $data);
  }

  function update_general($table, $id, $val, $data)
  {
    $this->db->where($id, $val);
    return $this->db->update($table, $data);
  }

  function delete_general($table, $id, $val)
  {
    $this->db->where($id, $val);
    return $this->db->delete($table);
  }

  function limit_general($table, $limit)
  {
    return $this->db->query("SELECT * FROM $table LIMIT $limit")->result();
  }

  function limit_general_order_by($table, $order_by, $order ,$limit)
  {
    return $this->db->query("SELECT * FROM $table ORDER BY $order_by $order LIMIT $limit")->result();
  }

  function limit_general_category_order_by($table,$category,$val_category, $order_by, $order ,$limit)
  {
    return $this->db->query("SELECT * FROM $table WHERE $category = '$val_category' ORDER BY $order_by $order LIMIT $limit")->result();
  }

  function limit_by_id_general_order_by($table, $id, $val, $order_by, $order ,$limit)
  {
    return $this->db->query("SELECT * FROM $table WHERE $id = '$val' ORDER BY $order_by $order LIMIT $limit")->result();
  }

  function limit_by_id_general_category_order_by($table, $id, $val,$category,$val_category, $order_by, $order ,$limit)
  {
    return $this->db->query("SELECT * FROM $table WHERE $id = '$val' AND $category = '$val_category' ORDER BY $order_by $order LIMIT $limit")->result();
  }
}
