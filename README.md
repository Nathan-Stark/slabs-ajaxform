# slabs-ajaxform
## Стандартная форма битрикс работающая на ajax с тремя шаблонами на выбор: bootstrap, uikit, fancybox2

Подключение компонента:
```
$APPLICATION->IncludeComponent(
	"bitrix:form.result.new", 
	"",
	[
		"CACHE_TIME" => "2592000", # 30 дней
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"EDIT_URL" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "Y",
		"WEB_FORM_ID" => "1",
		"COMPONENT_TEMPLATE" => "",
		"VARIABLE_ALIASES" => [
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		]
	],
	false
);
```
Обязательно USE_EXTENDED_ERRORS в значение Y

