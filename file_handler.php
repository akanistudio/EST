<?php

function file_handler($id) {
	$rows = get_field('js_i_css',$id);
	if($rows)
		{

			$i = 0;
			$ret = '';

			foreach($rows as $row)
			{/*
				$ret .= '<li>url = ' . $row['url_do_pliku'].'</li>'; 
				$ret .= '<li>typ = ' . $row['typ'] .'</li>';
				$ret .= '<li>typ2 = ' . $row['tryb_kompatybilny'];*/
				$extension = end(explode('.', $row['url_do_pliku']));
				if($row['tryb_kompatybilny']!=1) {
					if($extension=="js")
						$ret.="<script type='text/javascript' src='".$row['url_do_pliku']."'></script>";
					else if($extension=="css")
						$ret.="<link rel='stylesheet'  href='".$row['url_do_pliku']."' type='text/css' />";
				}
				else {
					if($extension=="js")
						$ret.='
						<script type=\'text/javascript\'>
							(function() {
								var parentElement = document.querySelector(\'head\');
	        					var theFirstChild = parentElement.firstChild;
								var ga = document.createElement(\'script\');
								ga.type = \'text/javascript\';
								ga.src = "'.$row['url_do_pliku'].'";
	        					parentElement.insertBefore(ga, theFirstChild);
	        				})();
						</script>';
					else if($extension=="css")
						$ret.='
							<script type=\'text/javascript\'>
								(function() {
									var parentElement = document.querySelector(\'head\');
	        						var theFirstChild = parentElement.firstChild;
							        var ga2 = document.createElement(\'link\');
							        ga2.href = "'.$row['url_do_pliku'].'";
							        ga2.rel = "stylesheet";
							        parentElement.insertBefore(ga2, theFirstChild);
   				 				})();
							</script>';
				}
			}

		}
	return $ret;
}

?>