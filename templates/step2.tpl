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
	<h2>{{t}}Конфигурация базы данных{{/t}}</h2>
	<div align="center" id="effect" class="ui-corner-all">
		<form action="{{$Url}}components/install/step3.php" method="post">
			<table>
				<tr>
					<td><label for="HostDB">{{t}}Имя хоста базы данных{{/t}}</label></td>
					<td><input type="text" name="HostDB" required size="30" value="localhost" class="space" id="HostDB"></td>
				</tr>
				<tr>
					<td><label for="PortDB">{{t}}Порт базы данных{{/t}}</label></td>
					<td><input type="text" name="PortDB" required size="30" value="3306" class="space" id="PortDB"></td>
				</tr>
				<tr>
					<td><label for="NameDB"  class="space">{{t}}Имя базы данных{{/t}}</label></td>
					<td><input type="text" name="NameDB" required size="30" class="space" id="NameDB"></td>
				</tr>
				<tr>
					<td><label>{{t}}Имя пользователя базы данных{{/t}}</label></td>
					<td><input type="text" name="UserDB" required size="30" class="space"></td>
				</tr>
				<tr>
					<td><label for="PasswordDB">{{t}}Пароль пользователя базы данных{{/t}}</label></td>
					<td><input type="password" name="PasswordDB" required size="30" class="space" id="PasswordDB"></td>
				</tr>
				<tr>
					<td align="center"><input type="submit" value="{{t}}схоранить{{/t}}" class="ui-button ui-widget ui-corner-all ui-state-default"></td>
					<td align="center"><input type="reset" value="{{t}}очистить{{/t}}" class="ui-button ui-widget ui-corner-all"></td>
				</tr>
			</table>
		</form>
	</div>
{{/block}}