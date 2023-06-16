<?php

class GlobalDataHook
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function load_global_data()
    {
        $CI =& get_instance();
        $CI->load->model('Compte');
        $data['code_journaux'] = $CI->Compte->get_code_journaux();
        $CI->load->vars($data);
    }
}