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
			$("#language")
				.selectmenu({width: 450})
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
	<div id="effect" class="cont widget ui-corner-all">
		<form action="{{$Url}}components/install/step2.php" method="post">
			<select name="LanguageSetup" id="language">
				{{foreach $LanguageList as $key => $Value}}
					{{if $key == $LanguageSystem}}
						<option value="{{$key}}" lang="{{$Value[1]}}" selected="selected">{{$Value[0]}}</option>
					{{else}}
						<option value="{{$key}}" lang="{{$Value[1]}}">{{$Value[0]}}</option>
					{{/if}}
				{{/foreach}}
			</select>
			<input id="button" class="ui-button ui-widget ui-state-default ui-corner-all" type="submit" value="OK">
		</form>
	</div>
{{/block}}