<?
if($updater->CanUpdateKernel())
{
	$arToDelete = array(
		"modules/main/install/components/bitrix/main.post.form/",
		"components/bitrix/main.post.form/",
		"modules/main/install/components/bitrix/main.post.list/",
		"components/bitrix/main.post.list/",
	);
	foreach($arToDelete as $file)
		CUpdateSystem::DeleteDirFilesEx($_SERVER["DOCUMENT_ROOT"].$updater->kernelPath."/".$file);
}

$updater->CopyFiles("install/components", "components");

if ($updater->CanUpdateDatabase())
{
	if(strtolower($DB->type) == "mysql")
	{
		if($DB->IndexExists("b_module_to_module", array("FROM_MODULE_ID", "MESSAGE_ID", "TO_MODULE_ID", "TO_CLASS", "TO_METHOD")))
		{
			$DB->Query("drop index ix_module_to_module on b_module_to_module");
		}
		if(!$DB->IndexExists("b_module_to_module", array("FROM_MODULE_ID", "MESSAGE_ID", "TO_MODULE_ID", "TO_CLASS", "TO_METHOD")))
		{
			$DB->Query("create index ix_module_to_module on b_module_to_module (FROM_MODULE_ID(20), MESSAGE_ID(20), TO_MODULE_ID(20), TO_CLASS(20), TO_METHOD(20))");
		}
	}
}
?>
