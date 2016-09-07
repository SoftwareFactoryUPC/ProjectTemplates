<?php
class MY_Output extends CI_Output {
 
    function __construct()
    {
        parent::__construct();

    }
 
    function set_title(){

        $CI =& get_instance();

        $query = $CI->db->query("SELECT * FROM configuracion");

        foreach($query->result_array() as $row){
            define($row['contitulo'],$row['convalor']);
        }
        
    }
}
?>