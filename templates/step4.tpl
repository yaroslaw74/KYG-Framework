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
			$(".widget input[type=submit]").button("enable");
				$("input[type=submit]").on("click", function(event) {
					event.preventDefault();
					runEffect();
					return false;
				});
			});
		});
	</script>
{{/block}}
{{block name=main}}
	<div align="center" id="effect" class="cont widget ui-corner-all">
		<h2  class="ui-corner-all">{{t}}Настройка суперадминистратора{{/t}}</h2>
		<form action="{{$Url}}components/install/step5.php" method="post" autocomplete="on">
			<table  class="ui-corner-all">
				<tr>
					<td><label for="AdminLogin"  class="ui-corner-all">{{t}}Логин администратора{{/t}}</label></td>
					<td><input type="text" name="AdminLogin" required size="30" class="space"></td>
				</tr>
				<tr>
					<td><label for="AdminEmail"  class="ui-corner-all">{{t}}Email администратора{{/t}}</label></td>
					<td><input type="email" name="AdminEmail" required size="30" class="space"></td>
				</tr>
				<tr>
					<td><label for="AdminPassword"  class="ui-corner-all">{{t}}Пароль администратора{{/t}}</label></td>
					<td><input type="password" name="AdminPassword" required size="30" class="space"></td>
				</tr>
			</table>
			<input type="submit" value="{{t}}схоранить{{/t}}" class="ui-button ui-widget ui-state-default ui-corner-all" id="button">
		</form>
	</div>
{{/block}}