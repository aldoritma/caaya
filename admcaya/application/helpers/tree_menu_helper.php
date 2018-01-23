<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function generate_tree_menu($data, $uri_segment = false)
{
	$this_ci =& get_instance();

	$str = "";
	
    foreach ($data as $index => $list)
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

		} else {
			$link = "javascript:;";
			$class = "<span class='active arrow'></span>";
		}
		
		if($index == (count($data)-1) ){
	        $str .= "
	        <li class='m-b-75 $active $block'>
			<a href='".$link."'>
			<span class='title'>$list[title]</span>".$class."</a>
			<span class='icon-thumbnail ".$activeb."'><i class='".$list['icon']."'></i></span>
			";
		} else {
	        $str .= "
	        <li class=' $active $block w'>
			<a href='".$link."'>
			<span class='title'>$list[title]</span>".$class."</a>
			<span class='icon-thumbnail ".$activeb."'><i class='".$list['icon']."'></i></span>
			";
		}
		
        $subchild = $list['child'];
		
        if ($subchild !== '')
		{
			if($list['dropdown'] != ""){

				$str .= " <ul class='sub-menu'>";	

				foreach ($subchild as $subchild)
				{
					$curr_child = $this_ci->uri->segment($this_ci->uri->total_segments());
					
					$active = ($subchild['url'] == $curr_child) ? 'active':'';
					$space = strpos($subchild['title'], " ");

					if($space !== FALSE && $space > 0){
						$initial = strtoupper(substr($subchild['title'], 0, 1).substr($subchild['title'], ++$space,1));
					} else {
						$initial = strtoupper(substr($subchild['title'], 0, 1));
					}

	            	$str .= "
					<li class='$active'>
					<a class='submenu' href='".base_url($list['url'].'/'.$subchild['url'])."'>
					".ucfirst($subchild['title'])."
					</a>
					<span class='icon-thumbnail hidden-xs'>".$initial."</span>
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

function generate_category($data, $child = FALSE)
{
	$category = "";
	if($child){
		$category .= "<ul style='list-style: none;'>";
	} else {
		$category .= "<ul style='list-style: none;padding-left: 0'>";
	}
    foreach ($data as $list)
    {
    	$category .= "<li>";
    	// $category .= '
    	// <div class="checkbox">
    	// 	<label">
    	// 		<input type="checkbox" name="category_id[]" id="category_id_'.$list['id'].'" value="'.$list['id'].'">
    	// 		'.$list['title'].'
    	// 	</label>
    	// </div>
    	// ';
        $category .= "<input type='checkbox' name='category_id[]' id='category_id_".$list['id']."' value='$list[id]'> $list[title]";
        $subchild = generate_category($list['child'], TRUE);
		
        if ($subchild !== '')
		{
			$category .= $subchild;
			// $category .= '<div style="margin-left:25px">'.$subchild.'</div>';
		}
		$category .= "</li>";
    }
	$category .= "</ul>";
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