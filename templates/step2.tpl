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
{{block name=Install_head_script}}
	<script>
		$(function() {
			function runEffect() {
				var selectedEffect = "{{$Effect}}";
				var options = {};
				if (selectedEffect === "scale") {
					options = {percent: 50};
				} else if (selectedEffect === "transfer") {
					options = {
						to: "#button",
						className: "ui-effects-transfer"
					};
				} else if (selectedEffect === "size") {
					options = {
						to: {
							width: 200, 
							height: 60 
						} 
					};
				}
				$("#effect").effect(selectedEffect, options, 500, callback);
			};
			function callback() {
				setTimeout(function() {
					$("#effect").removeAttr("style").hide().fadeIn();
				}, 1000);
			}; 
			$(".widget input[type=submit], .widget input[type=reset]").button("enable");
			$("input[type=submit]").on("click", function(event) {
				event.preventDefault();
				runEffect();
				return false;
			});
			$("input[type=reset]").on("click", function(event) {
				event.preventDefault();
			});
		});
	</script>
{{/block}}
{{block name=main}}
	<div class="cont widget ui-corner-all" id="effect" align="center">
		<h2 class="ui-corner-all">{{t}}Конфигурация базы данных{{/t}}</h2>
		<form action="{{$Url}}components/install/step3.php" method="post" autocomplete="on">
			<table class="ui-corner-all">
				<tr>
					<td><label for="HostDB" class="ui-corner-all">{{t}}Имя хоста базы данных{{/t}}</label></td>
					<td><input type="text" name="HostDB" required size="30" value="localhost" class="space" id="HostDB"></td>
				</tr>
				<tr>
					<td><label for="PortDB" class="ui-corner-all">{{t}}Порт базы данных{{/t}}</label></td>
					<td><input type="text" name="PortDB" required size="30" value="3306" class="space" id="PortDB"></td>
				</tr>
				<tr>
					<td><label for="NameDB"  class="ui-corner-all">{{t}}Имя базы данных{{/t}}</label></td>
					<td><input type="text" name="NameDB" required size="30" class="space" id="NameDB"></td>
				</tr>
				<tr>
					<td><label for="UserDB" class="ui-corner-all">{{t}}Имя пользователя базы данных{{/t}}</label></td>
					<td><input type="text" name="UserDB" required size="30" class="space"></td>
				</tr>
				<tr>
					<td><label for="PasswordDB" class="ui-corner-all">{{t}}Пароль пользователя базы данных{{/t}}</label></td>
					<td><input type="password" name="PasswordDB" required size="30" class="space" id="PasswordDB"></td>
				</tr>
				<tr>
					<td align="center"><input type="submit" value="{{t}}сохранить{{/t}}" class="ui-button ui-widget ui-state-default ui-corner-all" id="button"></td>
					<td align="center"s><input type="reset" value="{{t}}очистить{{/t}}" class="ui-button ui-widget ui-state-default ui-corner-all"></td>
				</tr>
			</table>
		</form>
	</div>
{{/block}}