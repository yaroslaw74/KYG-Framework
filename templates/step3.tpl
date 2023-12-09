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
			$("#TimeZoneSystem")
				.selectmenu({width: 400})
				.selectmenu("menuWidget")
        		.addClass("overflow");
			$("#DataFormatSystem")
				.selectmenu({width: 400})
				.selectmenu("menuWidget")
        		.addClass("overflow");
			$("#TimeFormatSystem")
				.selectmenu({width: 400})
				.selectmenu("menuWidget")
        		.addClass("overflow");
			$(".widget input[type=submit]").button("enable");
			$("input").on("click", function(event) {
				event.preventDefault();
				runEffect();
				return false;
			});
		});
	</script>
{{/block}}
{{block name=main}}
	<div align="center" id="effect" class="cont widget ui-corner-all">
		<h2 class="ui-corner-all">{{t}}Конфигурация системы{{/t}}</h2>
		<form action="{{$Url}}components/install/step4.php" method="post">
			<table class="ui-corner-all">
				<tr>
					<td><label for="TimeZoneSistem" class="ui-corner-all">{{t}}Часовой пояс{{/t}}</label></td>
					<td>
						<select  size="1" required name="TimeZoneSystem" id="TimeZoneSystem">
							{{foreach $TimeZone as $Value}}
								<option value="{{$Value}}" lang="en">{{$Value}}</option>
							{{/foreach}}
						</select>
					</td>
				</tr>
				<tr>
					<td><label for="DataFormatSystem" class="ui-corner-all">{{t}}Формат даты{{/t}}</label></td>
					<td>
						<select  size="1" required name="DataFormatSystem" id="DataFormatSystem">
							{{foreach $DataForm as $key => $Value}}
								<option value="{{$key}}">{{$key}} {{t}}например{{/t}} {{$Value}}</option>
							{{/foreach}}
						</select>
					</td>
				</tr>
				<tr>
					<td><label for="TimeFormatSystem" class="ui-corner-all">{{t}}Формат времени{{/t}}</label></td>
					<td>
						<select size="1" required name="TimeFormatSystem" id="TimeFormatSystem">
							{{foreach $TimeForm as $key => $Value}}
								<option value="{{$key}}">{{$key}} {{t}}например{{/t}} {{$Value}}</option>
							{{/foreach}}
						</select>
					</td>
				</tr>
			</table>
			<input type="submit" value="{{t}}схоранить{{/t}}" class="ui-button ui-widget ui-state-default ui-corner-all" id="button">
		</form>
	</div>
{{/block}}