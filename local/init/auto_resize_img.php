<?//Автоматический ресайзер картинок
// События которые срабатывают при создании или изменении элемента инфоблока
AddEventHandler("iblock", "OnAfterIBlockElementAdd", "ResizeUploadedPhoto");
AddEventHandler("iblock", "OnAfterIBlockElementUpdate", "ResizeUploadedPhoto");

function ResizeUploadedPhoto(&$arFields) {
  global $APPLICATION;
  CModule::IncludeModule('iblock');
  $IBLOCK_ID = 9; // ID инфоблока свойство которых нуждается в масштабировании / Если ИБ один
  $PROPERTY_CODE = "IB_IMG";  // код свойства
  $imageMaxWidth = 1000; // Максимальная ширина картинки
  $imageMaxHeight = 850; // Максимальная высота картинки
  // для начала убедимся, что изменяется элемент нужного нам инфоблока
  //ID 2 - каталог, ID 9 - наши работы
  if($arFields["IBLOCK_ID"] == $IBLOCK_ID) { //Оригинал if($arFields["IBLOCK_ID"] == $IBLOCK_ID)
	$VALUES = $VALUES_OLD = array();
	//Получаем свойство значение сво-ва $PROPERTY_CODE
	$res = CIBlockElement::GetProperty($arFields["IBLOCK_ID"], $arFields["ID"], "sort", "asc", array("CODE" => $PROPERTY_CODE));
	while ($ob = $res->GetNext()) {
		$file_path = CFile::GetPath($ob['VALUE']); // Получаем путь к файлу
		if($file_path) {
			$imsize = getimagesize($_SERVER["DOCUMENT_ROOT"].$file_path); //Узнаём размер файла
			// Если размер больше установленного максимума
			if($imsize[0] > $imageMaxWidth or $imsize[1] > $imageMaxHeight) {
				// Уменьшаем размер картинки
				$file = CFile::ResizeImageGet($ob['VALUE'], array(
						'width'=>$imageMaxWidth,
						'height'=>$imageMaxHeight
					), BX_RESIZE_IMAGE_PROPORTIONAL, true);
				// добавляем в массив VALUES новую уменьшенную картинку
				$VALUES[] = CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"].$file["src"]);
			} else {
				// добавляем в массив VALUES старую картинку
				$VALUES[] = CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"].$file_path);
			}
			// Собираем в массив ID старых файлов для их удаления (чтобы не занимали место)
			$VALUES_OLD[] = $ob['VALUE']; 
		}
	}
	// Если в массиве есть информация о новых файлах
	if(count($VALUES) > 0) {
		$PROPERTY_VALUE = $VALUES;  // значение свойства
		// Установим новое значение для данного свойства данного элемента
		CIBlockElement::SetPropertyValuesEx($arFields["ID"], $arFields["IBLOCK_ID"], array($PROPERTY_CODE => $PROPERTY_VALUE));
		// Удаляем старые большие изображения
		foreach ($VALUES_OLD as $key=>$val) {
			CFile::Delete($val);
		}
	}
	unset($VALUES);
	unset($VALUES_OLD);
  }
}
?>