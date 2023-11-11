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
	<h2>{{t}}Конфигурация системы{{/t}}</h2>
	<div align="center">
		<form action="{{$Url}}components/install/step4.php" method="post">
			<table>
				<tr>
					<td><label for="TimeZoneSistem">{{t}}Часовой пояс{{/t}}</label></td>
					<td>
						<select  class="space" size="1" required name="TimeZoneSistem" id="speed">
							{{foreach $TimeZone as $Value}}
								<option value="{{$Value}}" lang="en">{{$Value}}</option>
							{{/foreach}}
						</select>
					</td>
				</tr>
				<tr>
					<td><label for="DataSistem">{{t}}Формат даты{{/t}}</label></td>
					<td>
						<select  class="space" size="1" required name="DataSistem" id="speed">
							{{foreach $DataForm as $key => $Value}}
								<option value="{{$key}}">{{$key}} {{t}}например{{/t}} {{$Value}}</option>
							{{/foreach}}
						</select>
					</td>
				</tr>
				<tr>
					<td><label for="TimeSistem">{{t}}Формат времени{{/t}}</label></td>
					<td>
						<select  class="space" size="1" required name="TimeSistem" id="speed">
							{{foreach $TimeForm as $key => $Value}}
								<option value="{{$key}}">{{$key}} {{t}}например{{/t}} {{$Value}}</option>
							{{/foreach}}
						</select>
					</td>
				</tr>
			</table>
			<input type="submit" value="{{t}}схоранить{{/t}}" class="ui-button ui-widget ui-corner-all">
		</form>
	</div>
{{/block}}