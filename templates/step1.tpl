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
	<form action="{{$Url}}components/install/step2.php" method="post">
		<p>
			<select  class="lang" size="1" required name="LanguageSetup">
				{{foreach $LanguageList as $key => $Value}}
					<option value="{{$key}}" lang="{{$Value[1]}}">{{$Value[0]}}</option>
				{{/foreach}}
			</select>
			<input class="lang" type="submit" value="OK">
		</p>
	</form>
{{/block}}