<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Custom {
		
	Public function trim_news_title($news_title, $words_num) {
		$words = explode(" ",$news_title);
		$news_title_trim=implode(" ",array_splice($words,0,$words_num));
		$news_title_trim=strip_tags(str_replace("&nbsp;"," ",$news_title_trim),' ');
		return $news_title_trim;
	}
	
	Public function trim_content($words, $words_num) {
		$words=strip_tags(str_replace("&nbsp;"," ",$words),' ');
		$words = explode(" ",$words);
		$news_title_trim=implode(" ",array_splice($words,0,$words_num));
		return $news_title_trim;
	}
	
		
	function cut($text,$pan = 100)
	{
		//$text = preg_replace('/<(.*?)>/ie', '', $text);
		if(strlen($text) <= $pan)
			return $text;
		else
			return substr($text,0,$pan)." ...";
	}
	
	
	Public function ifsuper()
	{
		$CI =& get_instance();
		$user_type=$CI->session->userdata('user_type') ; 	
		if($user_type=='1'):
			return true;
		else:
			return false;
		endif;			
	}
	
	Public function trim($words, $words_num) {
		$words=strip_tags(str_replace("&nbsp;"," ",$words),' ');
		$words = explode(" ",$words);
		$news_title_trim=implode(" ",array_splice($words,0,$words_num));
		return $news_title_trim . '...';
	}
	
	Public function get_img($text) {	
		/*
		if((bool)preg_match('#<img[^>]+src=[\'"]([^\'"]+)[\'"]#', $text, $matches)){	
			$img=$matches[1];
			*/
			
			/*
			$url=getimagesize($img);
			if(!is_array($url))
			{
				$img= base_url() . "assets/images/web/notfound.jpg";	
			}	
			*/
			/*
		}
		else{
			$img= base_url() . "assets/images/web/notfound.jpg";
		}
		
		if($img==''){
			$img= base_url() . "assets/images/web/notfound.jpg";
		}
		return $img;
		*/
		return $text;
		
	}

	public function time_url($news_date, $news_url, $news_id) {
		$news_date = strtotime($news_date);
		$news_date = date("Y/m/d", $news_date);
		$url = sprintf( base_url() . 'read/%s/' . $news_url, $news_date);
		$url = $url . '/' . $news_id;
		return $url;
	}
	
	public function time_url_v($video_date, $video_url, $video_id) {
		$video_date = strtotime($video_date);
		$video_date = date("Y/m/d", $video_date);
		$url = sprintf( base_url() . 'video/watch/%s/' . $video_url, $video_date);
		$url = $url . '/' . $video_id;
		return $url;
	}
	
	public function time_url_m($news_date, $news_url, $news_id) {
		$news_date = strtotime($news_date);
		$news_date = date("Y/m/d", $news_date);
		$url = base_url() . 'm/berita/' . $news_id . '/' . $news_url;
		return $url;
	}
	
	public function time_url2($news_date, $news_url) {
		$news_date = strtotime($news_date);
		$news_date = date("Y/m/d", $news_date);
		$url = sprintf( base_url() . 'read/detil/%s/' . $news_url, $news_date);
		return $url;
	}
	
	function set_digit($angka,$digit = 2){
		$pan = strlen($angka);
		return str_repeat('0',$digit-$pan).$angka;
	}
	
	function date_changer($news_date, $type=1){
		$tanggal=$news_date;
		global $__bulan,$__hari;
		$arrT = explode(" ",$tanggal);

		$d = explode("-",$arrT[0]);
		$thn = (int)$d[0];
		$bln = (int)$d[1];
		$tgl = (int)$d[2];

		if($arrT[1] == '')
		{
			$j = 0;
			$m = 0;
			$d = 0;
		}
		else
		{
			$t = explode(":",$arrT[1]);
			$j = (int)$t[0];
			$m = (int)$t[1];
			$d = (int)$t[2];
		}


		$hari = mktime($j,$m,$d,$bln,$tgl,$thn);
		$cur_day=date("w",$hari);
				
		switch ($cur_day) {
			case "0" : $hari_txt="Minggu";break;
			case "1" : $hari_txt="Senin";break;
			case "2" : $hari_txt="Selasa";break;
			case "3" : $hari_txt="Rabu";break;
			case "4" : $hari_txt="Kamis";break;
			case "5" : $hari_txt="Jumat";break;
			case "6" : $hari_txt="Sabtu";break;
		}

		switch ($bln) {
			case "1" : $bln_txt="Jan";break;
			case "2" : $bln_txt="Feb";break;
			case "3" : $bln_txt="Mar";break;
			case "4" : $bln_txt="Apr";break;
			case "5" : $bln_txt="Mei";break;
			case "6" : $bln_txt="Jun";break;
			case "7" : $bln_txt="Jul";break;
			case "8" : $bln_txt="Agu";break;
			case "9" : $bln_txt="Sep";break;
			case "10" : $bln_txt="Okt";break;
			case "11" : $bln_txt="Nov";break;
			case "12" : $bln_txt="Des";break;
		}

		if(!isset($bln_txt)):
			$bln_txt='';
		endif;

		$t= array(	'hari'=>$hari_txt,
					'tgl'=>$this->set_digit($tgl),
					'bln'=>$bln_txt,
					'thn'=>$thn,
					'jam'=>$this->set_digit($j),
					'mnt'=>$this->set_digit($m),
					'dtk'=>$this->set_digit($d)
		);
		
		if($type==1):
			return $str =  $t['tgl'] . ' ' . $t['bln']  . ' '. $t['thn'] . ' ' . $t['jam'] . ':' . $t['mnt'] ;	
		elseif($type==2):
			return $str = $t['tgl'] . ' ' . substr($t['bln'],0,3) . ', ' . $t['thn']  . ' - ' . $t['jam'] . ':' . $t['mnt'] . ':' . $t['dtk'];
		elseif($type==3):
			return $str = $t['tgl'] . ' ' . substr($t['bln'],0,3) ;	
		elseif($type==4):
			return $str =  $t['jam'] . ':' . $t['mnt']  ;	
		endif;
	
	}	
	
	function nicetime($date,$granularity=2) {
		$retval='';
		$date=strtotime($date) + 3600; 
		//$db_date=date("Y-m-d H:i:s", $db_date);
		//$date = strtotime($date);

		$date= date($date, strtotime ("+7 hour"));

		$difference = time() - $date;
		$periods = array('decade' => 315360000,
		'tahun' => 31536000,
		'bulan' => 2628000,
		'minggu' => 604800,
		'hari' => 86400,
		'jam' => 3600,
		'menit' => 60,
		'detik' => 1);
		if ($difference < 5) { // less than 5 seconds ago, let's say "just now"
		$retval = "baru saja";
		return $retval;
		}

		else {
		
			foreach ($periods as $key => $value) {
			if ($difference >= $value) {
			$time = floor($difference/$value);
			$difference %= $value;
			$retval .= ($retval ? ' ' : '').$time.' ';
			$retval .= (($time > 1) ? $key : $key);
			$granularity--;
			}
			if ($granularity == '0') { break; }
			}
			return ' '.$retval.' lalu';
		}
	}
	
	function get_keyword($news_title, $web_desc)
	{
	
		$web_keyword_ok='';
		//fase 1
		//delet comma
		$sentence=str_replace(",", "", $news_title);
		// break $sentence using the space character as the delimiter
		$words1 = explode(' ', $sentence); 
		// loop through and print all the words
		for ($i = 0; $i < count($words1); $i++)
		{
			$web_keyword_ok=$web_keyword_ok . $words1[$i] . ', ';
		}
		
		//fase 2
		//delet comma
		$web_desc_trim=$this->get_description($web_desc);
		$web_desc_no_comma=str_replace(",", "", $web_desc_trim);
		$sentence2 = $web_desc_no_comma;
		//word limit
		$words9 = explode(" ",$sentence2);
		$sentence2=implode(" ",array_splice($words9,0,7));
		// break $sentence using the space character as the delimiter
		$words3 = explode(' ', $sentence2);; 
		// loop through and print all the words
		for ($i = 0; $i < count($words3); $i++)
		{
			$web_keyword_ok=$web_keyword_ok . $words3[$i] . ', ';
		}
		return $web_keyword_ok;
	
	}
		
	function get_description($web_desc) 
	{ 
		$web_desc_tags=strip_tags($web_desc);
		$web_desc_tags=str_replace("&nbsp;", " ", $web_desc_tags);
		$web_desc_tags=str_replace("&#39;", "'", $web_desc_tags);
		//$web_desc_clean = preg_replace( '/\s+/', ' ', $web_desc_tags );
		$web_desc_trim = explode(" ",$web_desc_tags);		
		return implode(" ",array_splice($web_desc_trim ,0,20));	
	}
	
	function get_description2($web_desc) 
	{ 
		$web_desc_tags=strip_tags($web_desc);
		$web_desc_tags=str_replace("&nbsp;", " ", $web_desc_tags);
		$web_desc_tags=str_replace("&#39;", "'", $web_desc_tags);
		//$web_desc_clean = preg_replace( '/\s+/', ' ', $web_desc_tags );
		$web_desc_trim = explode(" ",$web_desc_tags);		
		return implode(" ",array_splice($web_desc_trim ,0,30));	
	}
	
	function c($id, $news_user_id)
	{
		$CI =& get_instance();
		$is_logged_in=$CI->session->userdata('is_logged_in') ;  
		$user_id=$CI->session->userdata('user_id') ;  

		/*
		if($is_logged_in!='' && $news_user_id==$user_id):
			?>	
				&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="<?php echo base_url()?>admin/news/edit_selected/<?php echo $id?>">edit</a> 
			<?php
		elseif($is_logged_in!='' && $user_id==1):
		?>	
				&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="<?php echo base_url()?>admin/news/edit_selected/<?php echo $id?>">edit</a> 
			<?php

		endif;		
		*/
	}
	
	function get_jenis($id){
		if($id==0){
			$str='Koran';
		}
		elseif($id==1){
			$str='Online';
		}
		elseif($id==2){
			$str='Liputan Khusus';
		}
		return $str;		
	}
	
	function get_hl($id){
		if($id==0){
			$str='No';
		}
		elseif($id==1){
			$str='Yes';
		}
		return $str;		
	}
	
	function get_hlr($id){
		if($id==0){
			$str='No';
		}
		elseif($id==1){
			$str='Yes';
		}
		return $str;		
	}
			
}