<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="video-list">

<?foreach($arResult['NEW_ITEMS'] as $key=>$arSec):?>
	<?
	$res = CIBlockSection::GetByID($key);
	if($ar_res = $res->GetNext())
		echo '<h2>'; echo $ar_res['NAME']; echo '</h2>';
	?>
	
	<?foreach($arResult['NEW_ITEMS'][$key] as $arItem):?>
		<?//echo'<pre>'; print_r($arItem["NAME"]); echo'</pre>';?>
		<div class="video-item">
			<?
			$tube = str_replace("https://youtu.be/", "", $arItem["~PREVIEW_TEXT"]);
			$tube_video = "https://www.youtube.com/watch?v=" . $tube;
			$tube_img = "https://img.youtube.com/vi/" . $tube . "/0.jpg";
			if ($arItem["DETAIL_TEXT"]){
				$tube_title = $arItem["DETAIL_TEXT"];
			} else {
				$tube_title = $arItem["NAME"];
			}
			?>
			
			<div rel="nofollow" href="<?=$tube_video?>" class="fancy-video tube-lnk">
				<span class="ico-play"></span>
				<img rel="nofollow" src="<?=$tube_img?>" class="tube-img"/>
				<div class="tube_txt"><?=$tube_title?></div>
			</div>
			
			<?/*https://youtu.be/-flAyDdjh0s - прямая ссылка
			https://www.youtube.com/watch?v=-flAyDdjh0s - ссылка для воспроизведения в окне
			https://img.youtube.com/vi/-flAyDdjh0s/0.jpg - ссылка на картинку ролика*/?>
		</div>
	<?endforeach;?>
<?endforeach;?>
<?//global $USER; if($USER->IsAdmin()){echo'<pre>'; print_r($arResult['NEW_ITEMS']); echo'</pre>';}?>

<?/*if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;*/?>
</div>