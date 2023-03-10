<!DOCTYPE html>
<?php
  include "counter.inc.php";
?>
<html id="doc" class="hide">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="manifest" href="/music.webmanifest" crossorigin="use-credentials">
	<link rel="stylesheet" href="music.css" type="text/css">
	<link rel="stylesheet" href="music.theme.css" type="text/css">
	<link rel="icon" href="music.png" type="image/png">
	<script src="music.js"></script>
	<title id="pagetitle">...</title>
	<script src="Js/base-loading.js"></script>
</head>
<body onload="init()">
	<p style="color:white; font-size:10px; text-align: center">
		<b>&nbsp;&nbsp;&nbsp;&nbsp;
		 	<a href="https://github.com/ltGuillaume/MusicFolderPlayer" target="_blank" style="color:white; font-size:10px;">Music Folder Player</a>&nbsp;&nbsp;&nbsp;&nbsp;
			Shift-T 转换主题
		</b>
  	</p>
	<span id="splash"></span>
	<div id="player">
		<img id="cover" src="music.png" title="L: Zoom to 300px, full size (Z)&#xA;R: Toggle dimming"
			onclick="zoom()" oncontextmenu="toggle(event)"
			onload="this.style.opacity = ''" />
		<div id="current">
			<div id="album" class="title dim" onclick="setFilter(event)">Album Title</div>
			<div id="title" class="title dim" onclick="setFilter(event)">Track Title</div>
			<div id="time">00:00</div>
			<input id="seek" type="range" min="0" max="1" value="0" step="any"
				onchange="seek('c')" oninput="seek('i')" ontouchstart="onseek=true" ontouchend="onseek=false" disabled>
			<div id="controls">
				<button id="volume" title="L: Volume (U)&#xA;R: Mute (M)" onclick="toggle(event)" oncontextmenu="mute(event)"></button>
				<input  id="volumeslider" class="hide" type="range" min="0" step=".05" onchange="setVolume(event)" oninput="setVolume(event)">
				<button id="stop" title="Stop playback (Backspace)" onclick="stop()"></button>
				<button id="playpause" title="Play or pause (Space)" onclick="playPause()"></button>
				<button id="previous" title="Play previous ([)" onclick="previous()"></button>
				<button id="next" title="L: Play next (])&#xA;R: Skip artist"
					onclick="next()" oncontextmenu="skipArtist(event)"></button>
			</div>
		</div>
		<button id="toast" class="hide"></button>
	</div>
	<div id="options">
		<button id="enqueue" title="点击时添加单曲 (E)" onclick="toggle(event)">添加单曲</button>
		<button id="random" title="随机播放列表的歌曲 (R)" onclick="toggle(event)">随机播放</button>
		<button id="crossfade" title="歌曲间的交叉渐变 (O)" onclick="toggle(event)">淡进淡出</button>
		<button id="playlistbtn" title="播放列表选项 (P)" onclick="toggle(event)">列表选项</button>
		<button id="share" title="共享选项 (S)" onclick="toggle(event)">分享</button>
		<button id="lock" title="锁定播放列表和播放控件 (L)" onclick="toggle(event)">锁定</button>
		<button id="logbtn" title="显示日志 (G)" onclick="toggle(event)">日志</button>
		<div id="playlistoptions">
			<div id="playlistsdiv">
				<button id="load" title="添加在线播放列表中的歌曲 (D)" onclick="menu(event)">载入</button>
				<div id="playlists" title="L: 添加歌曲 (Enter)&#xA;R: 从播放列表删除" class="menu hide" onmouseleave="menu(event)"
					onclick="loadPlaylistBtn(event)" oncontextmenu="removePlaylist(event)">
				</div>
			</div>
			<button id="save" title="在线保存播放列表 (V)" onclick="prepPlaylists('save')">保存</button>
			<button id="import" title="添加来自导出播放列表的歌曲 (I)" onclick="importPlaylist()">导入</button>
			<button id="export" title="导出当前播放列表文件归档 (X)" onclick="exportPlaylist()">导出</button>
			<div id="afterdiv">
				<button id="after" title="在上个播放列表之后定义动作 (A)" onclick="menu(event)">列表结束后</button>
				<div id="afteroptions" class="menu hide" onmouseleave="menu(event)" onclick="toggle(event)">
					<button id="stopplayback" title="在上一个播放列表结束之后停止播放歌曲">停止播放</button>
					<button id="repeatplaylist" title="从头循环开始播放">循环播放</button>
					<button id="playlibrary" title="从上一首歌在音乐库的位置继续">从库继续播放</button>
					<button id="randomlibrary" title="从音乐库随机选择未播放的歌曲">从库随机播放</button>
					<button id="randomfiltered" title="从过滤库中随机选择未播放的歌曲">随机过滤 <span></span></button>
				</div>
			</div>
		</div>
		<div id="shares">
			<div class="folder sharediv">
				<input id="folderuri" class="uri" onclick="this.select()" readonly>
				<button id="folderdownload" class="download" title="下载目录" onclick="download('folder')"></button>
				<button id="folderclip" class="link" title="复制目录分享链接到粘贴板" onclick="clip('folder')"></button>
				<button id="folderwhatsapp" class="whatsapp hide" title="分享目录到WhatsApp" onclick="shareWhatsApp('folder')"></button>
			</div>
			<div class="song sharediv">
				<input id="songuri" class="uri" onclick="this.select()" readonly>
				<button id="songdownload" class="download" title="下载这首" onclick="download('song')"></button>
				<button id="songclip" class="link" title="复制这首分享链接到粘贴板" onclick="clip('song')"></button>
				<button id="songwhatsapp" class="whatsapp hide" title="分享这首到WhatsApp" onclick="shareWhatsApp('song')"></button>
			</div>
			<div id="shareplaylist" class="playlist sharediv">
				<input id="playlisturi" class="uri" placeholder="&#x25BE;" list="playlistdata" onclick="this.select()" onfocus="prepPlaylists('share')">
				<button id="playlistdownload" class="download" title="下载播放列表" onclick="download('playlist')"></button>
				<button id="playlistclip" class="link" title="复制播放列表分享链接到粘贴板" onclick="clip('playlist')"></button>
				<button id="playlistwhatsapp" class="whatsapp hide" title="分享播放列表到WhatsApp" onclick="shareWhatsApp('playlist')"></button>
				<datalist id="playlistdata"></datalist>
			</div>
			<a id="a" class="hide" href="#" target="_blank" download></a>
		</div>
	</div>
	<div id="playlistdiv" onmouseup="resizePlaylist()">
		<div>
			<div id="trash" class="hide" onclick="toggle(event)"
					ondragover="allowDrop(event)" ondrop="removeItem(event); cls(this, 'drop', REM)"
					ondragenter="cls(this, 'drop', ADD)" ondragleave="cls(this 'drop', REM)">
				<button id="clear" class="clear" title="清空播放列表 (C)"><u>清空列表</button>
				<button id="remove" title="删除播放列表项目">删除选中</button>
			</div>
			<ul id="playlist" onclick="clickItem(event)" oncontextmenu="findItem(event)"
				ondragstart="prepDrag(event)" ondragover="allowDrop(event)" ondragend="endDrag()" ondrop="dropItem(event)"
				ondragenter="cls(event.target, 'over', ADD)" ondragleave="cls(event.target, 'over', REM)"
				onmouseenter="onplaylist=true" onmouseleave="onplaylist=false"></ul>
		</div>
	</div>
	<div id="library">
		<div>
			<div class="hoverdiv">
				<button id="reload" title="重新加载音乐库 (F5)" onclick="reloadLibrary()"></button>
				<button id="unfold" title="显示/隐藏 音乐库目录 (T)" onclick="toggle(event)"></button>
			</div>
			<div id="filterdiv">
				<input id="filter" title="输入过滤项 (F)" placeholder="过滤..." onchange="filter()" onfocus="this.select()" onclick="setFocus(this)">
				<button class="filter" title="使用音乐库过滤 (Enter)" onclick="filter()"></button>
				<button class="clear" title="清空过滤器 (Esc)" onclick="clearFilter()"></button>
			</div>
			<ul id="tree" onclick="libClick(event)" oncontextmenu="libClick(event, true)"
				title="L: Open folder | Play/Enqueue song (Enter)&#xA;R: Enqueue folder | Play next (Shift-Enter)"></ul>
		</div>
	</div>
	<div id="logdiv" class="hide">
		<div>
			<div class="hoverdiv">
				<button id="theme" title="Change theme (Shift+T)" onclick="changeTheme()"></button>
				&nbsp;
				<button class="clear" title="Clear log" onclick="dom.log.value = ''"></button>
				<button class="clip" title="Copy log to clipboard" onclick="dom.log.select(); document.execCommand('copy')"></button>
				<button class="download" title="Save log" onclick="saveLog()"></button>
				<button class="min" title="Minimize log (G)" onclick="dom.logbtn.click()"></button>
			</div>
			<textarea id="log"></textarea>
		</div>
	</div>	
	<div id="dd" align=center>
	  <span>欢迎您!</span>
	  <span>您是本站的第
	   <?php 
	   echo $counter; 
	   ?>
	  位访客！</span>
	</div>
</body>
</html>
