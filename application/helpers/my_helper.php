<?php
	function active($uri)
	{
		$CI =& get_instance();
		return $uri==$CI->uri->segment(1) ? 'active' : '';
	}
	
    function upload_helper($path) {
        $CI =& get_instance();

        $config['upload_path']          = './uploads/' . $path;
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']  = '5096';
        $config['remove_space'] = TRUE;
        
        $CI->load->library('upload', $config);

        $CI->upload->initialize($config);
    }

    function upload_helper_profile($path) {
        $CI =& get_instance();

        $config['upload_path']          = './uploads/' . $path;
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']  = '5096';
        $config['remove_space'] = TRUE;
        
        $CI->load->library('upload', $config);
    }

    function upload_animasi_helper($path) {
        $CI =& get_instance();

        $config['upload_path']          = './uploads/' . $path;
        $config['allowed_types']        = 'gif|swf';
        $config['max_size']  = '10000';
        $config['remove_space'] = TRUE;
        
        $CI->load->library('upload', $config);
    }

	function format_teks($str)
	{
		return substr(trim($str), 0,100) . ' ...';
	}

	function get_column($table,$array)
	{
		$CI =& get_instance();
		return $CI->db->get_where($table,$array)->row();
	}

	function count_column($table,$array)
	{
		$CI =& get_instance();
		return $CI->db->get_where($table,$array)->num_rows();
	}


    function set_selected_option($master, $transact){
        // ($master == $transact) ? return 'selected'; : return null;
        if($master == $transact){
            return 'selected';
        }
        
        return '';
        
    }

    function tanggal_indonesia($tgl, $tampil_hari=true,$jam=true)
    {
    	date_default_timezone_set('Asia/Jakarta');
        $nama_hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
        $nama_bulan = array(1=>"Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        
        $tahun = substr($tgl,0,4);
        $bulan = $nama_bulan[(int)substr($tgl,5,2)];
        $tanggal = substr($tgl,8,2);
        
        $text = "";
        
        if($tampil_hari){
            $urutan_hari = date('w', mktime(0,0,0, substr($tgl,5,2), $tanggal, $tahun));
            $hari = $nama_hari[$urutan_hari];
            $text .= $hari.", ";
        }

        $text .= $tanggal ." ". $bulan ." ". $tahun;
        
        if($jam){
            $jam = date("H:i:s",strtotime($tgl));
            $text.=" ".$jam;
        }
        return $text;    
    }
