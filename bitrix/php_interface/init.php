<?
//Обработчик городов
require_once($_SERVER['DOCUMENT_ROOT']."/local/city/city_init.php");
//вывод 404 страницы на ненайденные элементы/разделы для комплексных компонентов
require_once($_SERVER['DOCUMENT_ROOT']."/local/init/404.php");
//Добавление конверсионного блока в конец страниц %convert%
require_once($_SERVER['DOCUMENT_ROOT']."/local/init/convert.php");
//Параметры водяного знака
require_once($_SERVER['DOCUMENT_ROOT']."/local/init/watermark.php");
//Автоматический ресайзер картинок
require_once($_SERVER['DOCUMENT_ROOT']."/local/init/auto_resize_img.php");
//Блокировка редактирования элемента для пользователя Editor ID 2
require_once($_SERVER['DOCUMENT_ROOT']."/local/init/block_edit.php");
?>