{{*smarty*}}
{{****************************************************************************************
  * @Project    KYG Framework
  * @Version    1.0
  * @Data       01.01.2024 г.
  *
  * @Copyright  (C) 2024 Kataev Yaroslav Georgievich 
  * @E-mail     yaroslaw74@gmail.com
  * @License    GNU General Public License version 3 or later; see LICENSE.txt
  ***************************************************************************************}}
{{locale path="./languages/{{$LanguageSystem}}/" domain="{{$Domain}}"}}
<!doctype html>
<html lang="{{$LanguagePage}}">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<meta name="robots" content="noindex, nofollow" />
		<meta name="autor" content="Kataev Yaroslav Georgievich" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
		<title>KYG Framework</title>
		<link rel="shortcut icon" href="{{$Url}}favicon.ico" type="image/x-icon" />
		<link rel="icon" sizes="48X48" href="{{$Url}}favicon.ico" type="image/x-icon" />
		<link rel="icon" sizes="32X32" href="{{$Url}}libraries/favicon/favicon-32x32.png" type="image/png" />
		<link rel="icon" sizes="256X256" href="{{$Url}}libraries/favicon/favicon-256x256.png" type="image/png" />
		<link rel="icon" sizes="512X512" href="{{$Url}}libraries/favicon/favicon-512x512.png" type="image/png" />
		<link rel="icon" size="1024X1024" href="{{$Url}}libraries/favicon/favicon-1024x1024.png" type="image/png" />
		<link rel="icon" sizes="any" href="{{$Url}}libraries/favicon/favicon.svg" type="image/svg+xml" />
		<link rel="stylesheet" href="{{$Url}}libraries/jquery-ui/themes/base/core.css" />
		<link rel="stylesheet" href="{{$Url}}libraries/jquery-ui/themes/base/accordion.css" />
		<link rel="stylesheet" href="{{$Url}}libraries/jquery-ui/themes/base/autocomplete.css" />
		<link rel="stylesheet" href="{{$Url}}libraries/jquery-ui/themes/base/button.css" />
		<link rel="stylesheet" href="{{$Url}}libraries/jquery-ui/themes/base/checkboxradio.css" />
		<link rel="stylesheet" href="{{$Url}}libraries/jquery-ui/themes/base/controlgroup.css" />
		<link rel="stylesheet" href="{{$Url}}libraries/jquery-ui/themes/base/datepicker.css" />
		<link rel="stylesheet" href="{{$Url}}libraries/jquery-ui/themes/base/dialog.css" />
		<link rel="stylesheet" href="{{$Url}}libraries/jquery-ui/themes/base/draggable.css" />
		<link rel="stylesheet" href="{{$Url}}libraries/jquery-ui/themes/base/menu.css" />
		<link rel="stylesheet" href="{{$Url}}libraries/jquery-ui/themes/base/progressbar.css" />
		<link rel="stylesheet" href="{{$Url}}libraries/jquery-ui/themes/base/resizable.css" />
		<link rel="stylesheet" href="{{$Url}}libraries/jquery-ui/themes/base/selectable.css" />
		<link rel="stylesheet" href="{{$Url}}libraries/jquery-ui/themes/base/selectmenu.css" />
		<link rel="stylesheet" href="{{$Url}}libraries/jquery-ui/themes/base/slider.css" />
		<link rel="stylesheet" href="{{$Url}}libraries/jquery-ui/themes/base/sortable.css" />
		<link rel="stylesheet" href="{{$Url}}libraries/jquery-ui/themes/base/spinner.css" />
		<link rel="stylesheet" href="{{$Url}}libraries/jquery-ui/themes/base/tabs.css" />
		<link rel="stylesheet" href="{{$Url}}libraries/jquery-ui/themes/base/tooltip.css" />
		<link rel="stylesheet" href="{{$Url}}libraries/jquery-ui/themes/{{$Theme}}/jquery-ui.min.css" />
		<link rel="stylesheet" href="{{$Url}}libraries/jquery-ui/themes/{{$Theme}}/theme.css" />
		{{block name=head_style}}{{/block}}
		<script src="{{$Url}}libraries/js/jquery-3.7.1.min.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/jquery-ui.min.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/version.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/jquery-patch.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/core.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/data.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/i18n/datepicker-{{$LanguageData}}.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/focusable.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/form.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/form-reset-mixin.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/ie.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/keycode.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/labels.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/plugin.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/position.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/safe-active-element.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/safe-blur.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/scroll-parent.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/tabbable.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/unique-id.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/widget.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/widgets/accordion.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/widgets/autocomplete.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/widgets/button.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/widgets/checkboxradio.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/widgets/controlgroup.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/widgets/datepicker.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/widgets/dialog.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/widgets/draggable.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/widgets/droppable.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/widgets/menu.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/widgets/mouse.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/widgets/resizable.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/widgets/selectable.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/widgets/selectmenu.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/widgets/slider.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/widgets/sortable.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/widgets/spinner.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/widgets/tabs.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/widgets/tooltip.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/jquery-var-for-color.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/vendor/jquery-color/jquery.color.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/effect.js"></script>
		<script src="{{$Url}}libraries/jquery-ui/ui/effects/effect-{{$Effect}}.js"></script>
		{{block name=head_script}}{{/block}}
	</head>
	<body>
		{{block name=body}}{{/block}}
	</body>
</html>