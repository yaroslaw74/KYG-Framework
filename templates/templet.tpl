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
		<link rel="stylesheet" href="{{$Url}}external/components/jqueryui/themes/base/jquery-ui.min.css" />
		<link rel="stylesheet" href="{{$Url}}external/components/jqueryui/themes/base/accordion.css" />
		<link rel="stylesheet" href="{{$Url}}external/components/jqueryui/themes/base/autocomplete.css" />
		<link rel="stylesheet" href="{{$Url}}external/components/jqueryui/themes/base/base.css" />
		<link rel="stylesheet" href="{{$Url}}external/components/jqueryui/themes/base/button.css" />
		<link rel="stylesheet" href="{{$Url}}external/components/jqueryui/themes/base/checkboxradio.css" />
		<link rel="stylesheet" href="{{$Url}}external/components/jqueryui/themes/base/controlgroup.css" />
		<link rel="stylesheet" href="{{$Url}}external/components/jqueryui/themes/base/core.css" />
		<link rel="stylesheet" href="{{$Url}}external/components/jqueryui/themes/base/datepicker.css" />
		<link rel="stylesheet" href="{{$Url}}external/components/jqueryui/themes/base/dialog.css" />
		<link rel="stylesheet" href="{{$Url}}external/components/jqueryui/themes/base/draggable.css" />
		<link rel="stylesheet" href="{{$Url}}external/components/jqueryui/themes/base/menu.css" />
		<link rel="stylesheet" href="{{$Url}}external/components/jqueryui/themes/base/progressbar.css" />
		<link rel="stylesheet" href="{{$Url}}external/components/jqueryui/themes/base/resizable.css" />
		<link rel="stylesheet" href="{{$Url}}external/components/jqueryui/themes/base/selectable.css" />
		<link rel="stylesheet" href="{{$Url}}external/components/jqueryui/themes/base/selectmenu.css" />
		<link rel="stylesheet" href="{{$Url}}external/components/jqueryui/themes/base/slider.css" />
		<link rel="stylesheet" href="{{$Url}}external/components/jqueryui/themes/base/sortable.css" />
		<link rel="stylesheet" href="{{$Url}}external/components/jqueryui/themes/base/spinner.css" />
		<link rel="stylesheet" href="{{$Url}}external/components/jqueryui/themes/base/tabs.css" />
		<link rel="stylesheet" href="{{$Url}}external/components/jqueryui/themes/base/tooltip.css" />
		<link rel="stylesheet" href="{{$Url}}external/components/jqueryui/themes/{{$Theme}}/theme.css" />
		{{block name=head_style}}{{/block}}
		<script src="{{$Url}}external/components/jquery/jquery.min.js"></script>
		<script src="{{$Url}}external/components/jqueryui/jquery-ui.min.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/minified/data.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/minified/effect.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/minified/escape-selector.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/minified/focusable.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/minified/form.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/minified/form-reset-mixin.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/minified/ie.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/minified/keycode.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/minified/labels.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/minified/plugin.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/minified/position.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/minified/safe-active-element.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/minified/safe-blur.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/minified/scroll-parent.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/minified/tabbable.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/minified/unique-id.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/minified/version.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/minified/widget.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/widgets/accordion.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/widgets/autocomplete.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/widgets/button.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/widgets/checkboxradio.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/widgets/controlgroup.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/widgets/datepicker.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/widgets/dialog.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/widgets/draggable.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/widgets/droppable.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/widgets/menu.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/widgets/mouse.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/widgets/progressbar.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/widgets/resizable.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/widgets/selectable.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/widgets/selectmenu.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/widgets/slider.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/widgets/sortable.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/widgets/spinner.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/widgets/tabs.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/widgets/tooltip.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/minified/i18n/datepicker-{{$LanguageData}}.js"></script>
		<script src="{{$Url}}external/components/jqueryui/ui/effects/effect-{{$Effect}}.js"></script>
		{{block name=head_script}}{{/block}}
	</head>
	<body>
		{{block name=body}}{{/block}}
	</body>
</html>