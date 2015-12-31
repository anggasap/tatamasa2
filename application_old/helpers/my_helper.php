<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function print_recursive_list($data){
    $str = "";
    foreach($data as $list){
		$subchild = print_recursive_list($list['child']);
		if($subchild != ''){
            $str .= '<li>';
			$str.= '<a href="'.site_url($list["link"]).'" id="id_a_menu_'.$list['id'].'">'; 
			$str.='<i class="icon-list"></i>&nbsp;'.$list['nama'].'<span class="arrow "></span></a>';//anchor($list['link'],$list['nama'])
			$str .= '<ul class="sub-menu">';
			$subchild = print_recursive_list($list['child']);
			$str .= $subchild;
			$str .= '</ul>';
        	$str .= '</li>';
		}else{
			$str .= '<li>';
			$str.= '<a href="'.site_url($list["link"]).'" id="id_a_menu_'.$list['id'].'">'; 
			$str.='<i class="icon-list"></i>&nbsp;'.$list['nama'].'</a>';//anchor($list['link'],$list['nama'])
			$subchild = print_recursive_list($list['child']);
			$str .= $subchild;
        	$str .= '</li>';
		}
		
        
        
        
    }
    return $str;
}

function print_recursive_menu_all_li($data){
    $str = "";
    foreach($data as $list){
		$subchild = print_recursive_menu_all_li($list['child']);
		if($subchild != ''){
            $str .= '<li id = "'.$list['id']."_".$list['parent'].'">';
			$str.= '<a href="" id = "a'.$list['id']."_".$list['parent'].'" >'; 
			$str.=$list['nama'].'</a>';//anchor($list['link'],$list['nama'])
			$str .= '<ul>';
			$subchild = print_recursive_menu_all_li($list['child']);
			$str .= $subchild;
			$str .= '</ul>';
			
        	$str .= '</li>';
		}else{
			$str .= '<li id = "'.$list['id']."_".$list['parent'].'">';
			$str.= '<a href="" id = "a'.$list['id']."_".$list['parent'].'" >'; 
			$str.=$list['nama'].'</a>';//anchor($list['link'],$list['nama'])
			$subchild = print_recursive_menu_all_li($list['child']);
			$str .= $subchild;
        	$str .= '</li>';
		}

    }
    return $str;
}

function print_recursive_secMenuUser($data){
    $str = "";
    foreach($data as $list){
		$subchild = print_recursive_secMenuUser($list['child']);
		if($subchild != ''){
            $str .= '<li id = "'.$list['id'].'">';
			$str.= '<a href="" id = "a'.$list['id'].'" attrMenuUri = "'.$list['link'].'">'; 
			$str.=$list['nama'].'</a>';//anchor($list['link'],$list['nama'])
			$str .= '<ul>';
			$subchild = print_recursive_secMenuUser($list['child']);
			$str .= $subchild;
			$str .= '</ul>';
			
        	$str .= '</li>';
		}else{
			$str .= '<li id = "'.$list['id'].'">';
			$str.= '<a href="" id = "a'.$list['id'].'" attrMenuUri = "'.$list['link'].'">'; 
			$str.=$list['nama'].'</a>';//anchor($list['link'],$list['nama'])
			$subchild = print_recursive_secMenuUser($list['child']);
			$str .= $subchild;
        	$str .= '</li>';
		}

    }
    return $str;
}



