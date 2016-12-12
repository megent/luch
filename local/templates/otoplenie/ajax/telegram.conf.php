<?
function TelegramBot($text) { //Вызов TelegramBot($parameter);
	$content = $text;
	define('BOT_TOKEN', '240414950:AAF4kar-cVRO45-ZEhA_dZ687_TfL6-B1Ww');
	define('CHAT_ID', '-176768255');
	define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');

	//https://api.telegram.org/bot240414950:AAF4kar-cVRO45-ZEhA_dZ687_TfL6-B1Ww/getUpdates

	$parameters = array(
		'chat_id'	=> CHAT_ID,
		'text'		=> $content
	);

	$url = API_URL.'sendMessage?'.http_build_query($parameters);
	$handle = curl_init($url);

	curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
	curl_setopt($handle, CURLOPT_TIMEOUT, 60);

	curl_exec($handle);
	curl_close($handle);
}
?>

<?/* Подключение файла
require_once('./telegram.conf.php');
*/?>