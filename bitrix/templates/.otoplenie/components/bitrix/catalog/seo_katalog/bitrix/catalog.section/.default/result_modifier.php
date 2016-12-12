<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();?>

<?foreach($arResult['UF_IMG'] as $key=>$Filds):
	$file = CFile::ResizeImageGet($Filds, array('width'=>1000, 'height'=>1000), BX_RESIZE_IMAGE_EXACT, true);
	
	$key++;
	$img[$key] = $file['src'];
	//"#img1#"
	$arResult['DESCRIPTION'] = str_replace("#img".$key."#", $img[$key], $arResult['DESCRIPTION']);
endforeach;?>
