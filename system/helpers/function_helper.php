<?
function rewrite_employee_link($alias, $id)
{
	return '/' . $alias . '-gv' . $id . '.html';
}

function rewrite_new_detail_link($alias, $id)
{
	return '/' . $alias . '-n' . $id . '.html';
}

function rewrite_tag_link($alias, $id) 
{
	return '/tim-' . $alias . '-gvt' . $id . 'c0d0.html';
}

function rewrite_tag_job_link($alias, $id)
{
	return '/tim-viec-lam-' . $alias . '-vlt' . $id . 'c0d0.html';
}

function rewrite_company_link($alias,$id)
{
	return '/'.$alias.'-c'.$id.'.html';
}

function create_slug($string)
{
	$search = array(
		'#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
		'#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
		'#(ì|í|ị|ỉ|ĩ)#',
		'#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
		'#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
		'#(ỳ|ý|ỵ|ỷ|ỹ)#',
		'#(đ)#',
		'#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
		'#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
		'#(Ì|Í|Ị|Ỉ|Ĩ)#',
		'#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
		'#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
		'#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
		'#(Đ)#',
		"/[^a-zA-Z0-9\-\_]/",
	);
	$replace = array(
		'a',
		'e',
		'i',
		'o',
		'u',
		'y',
		'd',
		'A',
		'E',
		'I',
		'O',
		'U',
		'Y',
		'D',
		'-',
	);
	$string = preg_replace($search, $replace, $string);
	$string = preg_replace('/(-)+/', '-', $string);
	$string = strtolower($string);
	return $string;
}

function remove_accent($string)
{
	$search = array(
		'#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
		'#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
		'#(ì|í|ị|ỉ|ĩ)#',
		'#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
		'#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
		'#(ỳ|ý|ỵ|ỷ|ỹ)#',
		'#(đ)#',
		'#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
		'#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
		'#(Ì|Í|Ị|Ỉ|Ĩ)#',
		'#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
		'#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
		'#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
		'#(Đ)#'
	);
	$replace = array(
		'a',
		'e',
		'i',
		'o',
		'u',
		'y',
		'd',
		'A',
		'E',
		'I',
		'O',
		'U',
		'Y',
		'D'
	);
	$string = preg_replace($search, $replace, $string);
	return $string;
}

function replaceTitle($title){
	$title = html_entity_decode($title, ENT_COMPAT, 'UTF-8');
	$title  = remove_accent($title);
	$title = str_replace('/', '',$title);
	$title = preg_replace('/[^\00-\255]+/u', '', $title);

	if (preg_match("/[\p{Han}]/simu", $title)) {
		$title = str_replace(' ', '-', $title);
	}else{
		$arr_str  = array( "&lt;","&gt;","/"," / ","\\","&apos;", "&quot;","&amp;","lt;", "gt;","apos;", "quot;","amp;","&lt", "&gt","&apos", "&quot","&amp","&#34;","&#39;","&#38;","&#60;","&#62;","&nbsp;");

		$title  = str_replace($arr_str, " ", $title);
		$title  = preg_replace('/\p{P}|\p{S}/u', ' ', $title);
		$title = preg_replace('/[^0-9a-zA-Z\s]+/', ' ', $title);

		//Remove double space
		$array = array(
			'    ' => ' ',
			'   ' => ' ',
			'  ' => ' ',
		);
		$title = trim(strtr($title, $array));
		$title  = str_replace(" ", "-", $title);
		$title  = urlencode($title);
		// remove cac ky tu dac biet sau khi urlencode
		$array_apter = array("%0D%0A","%","&");
		$title  = str_replace($array_apter,"-",$title);
		$title  = strtolower($title);
	}
	return $title;
}

function makeML_content($content, $search = '', $replace = '')
{
	if ($content != '') {
		require_once("simple_html_dom.php");
		$html = str_get_html($content);
		$h2s = $html->find("h2,h3,h4,.h2-class,.h3-class");
		$patterns = array('/\d+\.\d+\.\d+\.\s/i', '/\d+\.\d+\.\s/i', '/\d+\.\s/i');
		foreach ($h2s as $h2) {
			$text = preg_replace($patterns, '', str_replace('&nbsp;', ' ', $h2->plaintext), 1);
			$id = replaceTitle($text);
			if ($id == $search && $id != '') {
				$id = $replace;
			}
			$h2->id = $id;
		}
		$html = $html->save();
		return $html;
	}
}

function makeML($content, $search = '', $replace = '')
{
	if ($content != '') {
		require_once("simple_html_dom.php");
		$html = str_get_html($content);
		$h2s = $html->find("h2,h3,h4,.h2-class,.h3-class");
		$patterns = array('/\d+\.\d+\.\d+\.\s/i', '/\d+\.\d+\.\s/i', '/\d+\.\s/i');
		$ml = "<div class='boxmucluc'><ul>";
		$i = $u = $j = 0;

		if (!empty($h2s)) {
			foreach ($h2s as $h2) {
				$text = preg_replace($patterns, '', str_replace('&nbsp;', ' ', $h2->plaintext), 1);
				$id = replaceTitle($text);
				if ($id == $search) {
					$id = $replace;
				}
				$h2->id = $id;
				if ($h2->tag == 'h2' || $h2->class == 'h2-class') {
					$i++;
					$ml .= "<li class=ml_h2><a class=ml_h2 href='#" . $id . "'>" . $i . ". " . $text . "</a></li>";
					$j = 0;
				}
				if ($h2->tag == 'h3' || $h2->class == 'h3-class') {
					$j++;
					$ml .= "<li class=ml_h3><a class=ml_h3 href='#" . $id . "'>" . $i . "." . $j . ". " . $text . "</a></li>";
					$u = 0;
				}
				if ($h2->tag == 'h4') {
					$u++;
					$ml .= "<li class=ml_h4><a class=ml_h4 href='#" . $id . "'>" . $i . "." . $j . "." . $u . ". " . $text . "</a></li>";
				}
			}
			$ml .= '</ul></div>';
			echo $ml;
		}
	}
}

function SendMail123($title,$name,$email,$body){
	$curl = curl_init();
	curl_setopt_array($curl, array(
	CURLOPT_RETURNTRANSFER => 1,
	CURLOPT_URL => 'https://vieclam123.vn/api_sendemail',
	CURLOPT_POST => 1,
		CURLOPT_SSL_VERIFYPEER => false, 
		CURLOPT_POSTFIELDS => array(
		'email' => $email,
		'body'  => $body,
		'title' => $title,
		'name' => $name,
		)
	));
	$resp = curl_exec($curl);
	$responsive = json_decode($resp);
	curl_close($curl);
	return $responsive;
}

function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));
 
    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }
 
    return $key;
}

function rewirte_job_style_img_href($id,$img){
	return '/upload/job_style/job_style_'.$id.'/'.$img;
}

function rewirte_user_img_href($id,$img){
	return '/upload/users/user_'.$id.'/'.$img;
}

function rewirte_company_img_href($id,$img){
	return '/upload/companys/company_'.$id.'/'.$img;
}

function ci_pagination($url,$total_rows,$row_per_page){
			$pagination['base_url'] = $url;
			$pagination['total_rows'] = $total_rows;
			$pagination['per_page'] = $row_per_page;
			$pagination['page_query_string']=true;
			$pagination['num_tag_open'] = '<button class="t_paginate_item">';
			$pagination['num_tag_close'] = '</button>';
			$pagination['first_tag_open'] = '<button class="t_paginate_item t_paginate_item_big">';
			$pagination['first_tag_close'] = '</button>';
			$pagination['last_tag_open'] = '<button class="t_paginate_item t_paginate_item_big">';
			$pagination['last_tag_close'] = '</button>';
			$pagination['next_tag_open'] = '<button class="t_paginate_item t_paginate_item_next">';
			$pagination['next_tag_close'] = '</button>';
			$pagination['prev_tag_open'] = '<button class="t_paginate_item t_paginate_item_prev">';
			$pagination['prev_tag_close'] = '</button>';
			$pagination['cur_tag_open'] = '<button class="t_paginate_item t_paginate_active">';
			$pagination['first_link'] = 'Đầu';
			$pagination['last_link'] = 'Cuối';
			$pagination['query_string_segment'] = 'page';
			$pagination['use_page_numbers'] = TRUE;
			return $pagination;
}

function full_path()
			{
				$s = &$_SERVER;
				$ssl = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on') ? true:false;
				$sp = strtolower($s['SERVER_PROTOCOL']);
				$protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
				$port = $s['SERVER_PORT'];
				$port = ((!$ssl && $port=='80') || ($ssl && $port=='443')) ? '' : ':'.$port;
				$host = isset($s['HTTP_X_FORWARDED_HOST']) ? $s['HTTP_X_FORWARDED_HOST'] : (isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : null);
				$host = isset($host) ? $host : $s['SERVER_NAME'] . $port;
				$uri = $protocol . '://' . $host . $s['REQUEST_URI'];
				$segments = explode('?', $uri, 2);
				$url = $segments[0];
				return $url;
			}

function CURL()
			{
				$s = &$_SERVER;
				$ssl = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on') ? true:false;
				$sp = strtolower($s['SERVER_PROTOCOL']);
				$protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
				$port = $s['SERVER_PORT'];
				$port = ((!$ssl && $port=='80') || ($ssl && $port=='443')) ? '' : ':'.$port;
				$host = isset($s['HTTP_X_FORWARDED_HOST']) ? $s['HTTP_X_FORWARDED_HOST'] : (isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : null);
				$host = isset($host) ? $host : $s['SERVER_NAME'] . $port;
				$uri = $protocol . '://' . $host . $s['REQUEST_URI'];
				$url = $uri;
				return $url;
			}

function rewrite_salary($salary_type, $salary1, $salary2,$salary_time){
	if($salary_type==0){
		$salary=number_format($salary1, 0, '', '.') . 'vnđ';
	}
	else{
		$salary=number_format($salary1, 0, '', '.')." - ". $salary=number_format($salary2, 0, '', '.') . 'vnđ';
	}
	switch($salary_time){
		case '1':
			$salary.=' /Tháng';
			break;
		case '2':
			$salary.=' /Tuần';
			break;
		case '3':
			$salary.=' /Giờ';
	}
	return $salary;
}
