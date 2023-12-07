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
{{block name=install_head_style}}
<style>
	.progress-bar {
		height: 30px;
		width: 98%;
		background-color: #f3f3f3;
		position: relative;
		margin: 60px 0 20px 0;
		background: #555;
		-moz-border-radius: 25px;
		-webkit-border-radius: 25px;
		border-radius: 25px;
		padding: 10px;
		-webkit-box-shadow: inset 0 -1px 1px rgba(255,255,255,0.3);
		-moz-box-shadow: inset 0 -1px 1px rgba(255,255,255,0.3);
		box-shadow: inset 0 -1px 1px rgba(255,255,255,0.3);
	}
	.progress-bar > .progress-bar-inner {
		display: block;
		height: 100%;
		width: 0;
		background-color: #4caf50;
		-webkit-border-top-right-radius: 20px;
		-webkit-border-bottom-right-radius: 20px;
		-moz-border-radius-topright: 20px;
		-moz-border-radius-bottomright: 20px;
		border-top-right-radius: 20px;
		border-bottom-right-radius: 20px;
		-webkit-border-top-left-radius: 20px;
		-webkit-border-bottom-left-radius: 20px;
		-moz-border-radius-topleft: 20px;
		-moz-border-radius-bottomleft: 20px;
		border-top-left-radius: 20px;
		border-bottom-left-radius: 20px;
		background-color: rgb(43,194,83);
		background-image: -webkit-gradient(
			  linear,
			  left bottom,
			  left top,
			  color-stop(0, rgb(43,194,83)),
			  color-stop(1, rgb(84,240,84))
			 );
		background-image: -moz-linear-gradient(
			  center bottom,
			  rgb(43,194,83) 37%,
			  rgb(84,240,84) 69%
			 );
		-webkit-box-shadow: 
			  inset 0 2px 9px rgba(255,255,255,0.3),
			  inset 0 -2px 6px rgba(0,0,0,0.4);
		-moz-box-shadow: 
			  inset 0 2px 9px rgba(255,255,255,0.3),
			  inset 0 -2px 6px rgba(0,0,0,0.4);
		box-shadow: 
			  inset 0 2px 9px rgba(255,255,255,0.3),
			  inset 0 -2px 6px rgba(0,0,0,0.4);
		position: relative;
		overflow: hidden;
	}
	.progress-bar > .progress-bar-inner:after {
		content: "";
		position: absolute;
		top: 0; left: 0; bottom: 0; right: 0;
		background-image: 
			-webkit-gradient(linear, 0 0, 100% 100%, 
				color-stop(0.25, rgba(255, 255, 255, 0.2)), 
				color-stop(0.25, transparent), 
				color-stop(0.5, transparent), 
			    color-stop(0.5, rgba(255, 255, 255, 0.2)), 
			    color-stop(0.75, rgba(255, 255, 255, 0.2)), 
			    color-stop(0.75, transparent), to(transparent)
		);
		background-image:
			-moz-linear-gradient(
				-45deg,
				rgba(255, 255, 255, 0.2) 25%,
				transparent 25%,
				transparent 50%,
				rgba(255, 255, 255, 0.2) 50%,
				rgba(255, 255, 255, 0.2) 75%,
				transparent 75%,
				transparent
			);
		z-index: 1;
		-webkit-background-size: 50px 50px;
		-moz-background-size: 50px 50px;
		-webkit-animation: move 2s linear infinite;
		-webkit-border-top-right-radius: 20px;
		-webkit-border-bottom-right-radius: 20px;
		-moz-border-radius-topright: 20px;
		-moz-border-radius-bottomright: 20px;
		border-top-right-radius: 20px;
		border-bottom-right-radius: 20px;
		-webkit-border-top-left-radius: 20px;
		-webkit-border-bottom-left-radius: 20px;
		-moz-border-radius-topleft: 20px;
		-moz-border-radius-bottomleft: 20px;
		border-top-left-radius: 20px;
		border-bottom-left-radius: 20px;
		overflow: hidden;
	}
	@-webkit-keyframes move {
		0% {
			background-position: 0 0;
		}
		100% {
			background-position: 50px 50px;
		}
	}
</style>
{{/block}}
{{block name=Install_head_script}}
<script>
	$(function() {
		$(".progress-bar > .progress-bar-inner").each(function() {
			$(this)
				.data("origWidth", $(this).width())
				.width(0)
				.animate({
				width: $(this).data("origWidth")
			}, 1200);
		});
	});
</script>
{{/block}}
{{block name=main}}
	<h2>{{t}}Производится установка параметров, пожалуйста подождите{{/t}}</h2>
	<div class="progress-bar">
		<span class="progress-bar-inner"></span>
	</div>	
{{/block}}
{{block name=script}}
<script>
	const progressBar = document.querySelector('.progress-bar-inner');

	var myVar = setInterval(function() {
		$.ajax({
			type: 'POST',
			url: '{{$Url}}components/install/progress.php',
			dataType: 'text',
			success: function(data) {
				progressBar.style.width = data + '%';
			},
		});
	}, 2000);
	
	if (progressBar.style.width == '100%') clearInterval(myVar);
	
</script>
{{/block}}