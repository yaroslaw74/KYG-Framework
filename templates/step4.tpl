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
{{extends file='install.tpl'}}
{{block name=main}}
	<h2>{{t}}Настройка суперадминистратора{{/t}}</h2>
	<div align="center">
		<form action="{{$Url}}components/install/step5.php" method="post" autocomplete="on">
			<table>
				<tr>
					<td><label for="AdminLogin">{{t}}Логин администратора{{/t}}</label></td>
					<td><input type="text" name="AdminLogin" required size="15" class="space"></td>
				</tr>
				<tr>
					<td><label for="AdminPassword">{{t}}Пароль администратора{{/t}}</label></td>
					<td><input type="password" name="AdminPassword" required size="15" class="space"></td>
				</tr>
			</table>
			<input type="submit" value="{{t}}схоранить{{/t}}" class="ui-button ui-widget ui-corner-all">
		</form>
	</div>
{{/block}}