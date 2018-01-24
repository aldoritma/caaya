<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function generate_tree_menu($data, $uri_segment = false)
{
	$str = "";
	
    foreach ($data as $list)
    {
		if ($uri_segment === $list['url'])
		{
			$active = 'active';
			$block = 'open';
			$activeb = "bg-success";
		}
		else
		{
			$active = "";
			$block = "";
			$activeb = "";
		}

		if($list['dropdown'] == ""){

		$link = base_url($list['url']);
		$class = "";

		}else{
		
		$link = "javascript:;";
		$class = "<span class='active open arrow'></span>";
		}
		
		
        $str .= "
        <li class='$list[dropdown] $active $block'>
		<a href='".$link."'>
		<span class='title'>$list[title]</span>".$class."</a>
		<span class='icon-thumbnail ".$activeb."'><i class='".$list['icon']."'></i></span>
		";
		
		
        $subchild = $list['child'];
		
        if ($subchild !== '')
		{
			if($list['dropdown'] == ""){  }else{

			$str .= " <ul class='sub-menu'>";	
			foreach ($subchild as $subchild)
			{
            	$str .= "
				<li class='$active'>
				<a class='submenu' href='".base_url(''.$list['url'].'/'.$subchild['url'])."'>
				<i class='fa ".$subchild['icon']."'></i><span class='hidden-sm'> ".ucfirst($subchild['title'])."</span>
				</a>
				";
				
				$str .= '</li>';
			}
			$str .= "</ul>";
		}

		}
		
        $str .= "</li>";
    }
	
    return $str;
}

function generate_category($data)
{
	$category = "";
	
    foreach ($data as $list)
    {
        $category .= "<span class='formwrapper'><input type='checkbox' name='category_id[]' id='category_id' value='$list[id]'> $list[title]</span>";
        $subchild = generate_category($list['child']);
		
        if ($subchild !== '')
		{
			$category .= '<div style="margin-left:25px">'.$subchild.'</div>';
		}
    }
	
    return $category;
}

function generate_category_edit($data)
{
	$category = "";
	
    foreach ($data as $list)
    {
        $category .= "<li><input type='checkbox' name='category_id[]' id='category_id' value='$list[id]' data-title='$list[title]' class='chk_categories'> $list[title]</li>";
        $sub_category = generate_category_edit($list['child']);
		
		
        if ($sub_category !== '')
		{
			$category .= '<div style="margin-left:30px">'.$sub_category.'</div>';
		}
    }
	
    return $category;
}