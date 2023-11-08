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
{{extends file='templet.tpl'}}
{{block name=head_style}}
	<link rel="stylesheet" href="{{$Url}}libraries/css/Install.css">
	{{block name=install_head_style}}{{/block}}
{{/block}}
{{block name=head_script}}
	{{block name=Install_head_script}}{{/block}}
{{/block}}
{{block name=body}}
	<header>
		{{include file='svg.tpl'}}
	</header>
	<article>
		<h1>KYG Framework</h1>
	</article>
	<main>
		{{block name=main}}{{/block}}
	</main>
	{{block name=script}}{{/block}}
{{/block}}