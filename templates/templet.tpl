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
		{{block name=head}}{{/block}}
	</head>
	<body>
		{{block name=body}}{{/block}}
	</body>
</html>