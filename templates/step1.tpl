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
	<div align="center">
		<form action="{{$Url}}components/install/step2.php" method="post">
			<select  class="lang" name="LanguageSetup" id="number">
				{{foreach $LanguageList as $key => $Value}}
					{{if $key == $LanguageSystem}}
						<option value="{{$key}}" lang="{{$Value[1]}}" selected="selected">{{$Value[0]}}</option>
					{{else}}
						<option value="{{$key}}" lang="{{$Value[1]}}">{{$Value[0]}}</option>
					{{/if}}
				{{/foreach}}
			</select>
			<input class="ui-button ui-widget ui-corner-all" type="submit" value="OK">
		</form>
	</div>
{{/block}}