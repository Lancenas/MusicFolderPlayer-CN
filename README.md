## **本库停止更新，中文翻译已经和源项目[ltGuillaume/MusicFolderPlayer](https://github.com/ltGuillaume/MusicFolderPlayer)合并，直接Git部署中文音乐文件播放web站。**
## 说明
- 本项目是[ltGuillaume/MusicFolderPlayer](https://github.com/ltGuillaume/MusicFolderPlayer)适配中文环境，源代码同步更新。
- 个人需要增加了一些功能代码


<a href="https://buymeacoff.ee/ltGuillaume"><img title="Donate using Buy Me a Coffee" src="https://raw.githubusercontent.com/ltGuillaume/Resources/master/buybeer.svg"></a> <a href="https://liberapay.com/ltGuillaume/donate"><img title="Donate using Liberapay" src="https://raw.githubusercontent.com/ltGuillaume/Resources/master/liberapay.svg"></a>

# Music Folder Player
An elegant HTML5 web folder player for parties and/or private music collections, with a playlist system that all players should have had. It does not use a database (so it's alway up-to-date), but can easily handle folders with 25,000 songs or more. It has no dependencies other than PHP and installation costs less than 2 minutes. The design should be fully responsive on CSS3-compatible browsers.

![Screenshot](SCREENSHOT.gif)

## Overview
#### Player
- Rebuilds the tree of a specified folder, showing only files with supported extensions
- Click on cover image to zoom (300x300px, again for full size)
- Click on current song or folder name to find it in the library
#### Playlist
- Drag and drop to change the playlist order or drag to bin to remove
- Random playback will prevent choosing already played songs (unless "Play next" is used)
- Click on a song to play directly
- Right-click (long-press) a song to find it in the library
- Choose how to continue when the playlist is exhausted:
	- Stop playback
	- Repeat the playlist
	- Continue from last song's position in library
	- Randomly select unplayed songs from the (filtered) library
- Playlist and configuration will be saved to the browser's Local Storage if possible
- Load/save online playlists (optional)
- Import/export playlists from/to a local file
#### Library
- Sports a library filter to quickly find songs
- Click a song to play (or enqueue when "Enqueue" mode is enabled)
- Clicking on a song will always keep the playlist intact
- Right-click (long-press) a song to play it next
- Right-click (long-press) a folder to add all its songs to the playlist
- Use arrow keys to traverse the library tree, Enter to play/enqueue, or Shift-Enter to play next/add folder
#### Parties
- Password lock the playlist and playlist controls (allowing only Enqueue, Play next, Play/pause and Share)
- Tip: use [OpenKiosk](http://openkiosk.mozdevgroup.com) and disable _Set inactive terminal_
- Prevents adding a song if it's already queued up
- Do not add previously played songs to playlist (optional)
#### Sharing
- Download a song or zipped folder
- Share a song, folder or playlist link (library features/options will be hidden)
- Share links directly to WhatsApp (optional)

## List of hotkeys
A list of all the hotkeys can be found in the [Wiki](https://github.com/ltGuillaume/MusicFolderPlayer/wiki/List-of-hotkeys).

## Installation
You can have a test setup running within 2 minutes. For all the details, check the [Wiki](https://github.com/ltGuillaume/MusicFolderPlayer/wiki).

## Credits
- Some concepts of this project are based on the excellent [HTML5 Music Player](https://github.com/GM-Script-Writer-62850/HTML5-Music-Player) by [GM-Script-Writer-62850](https://github.com/GM-Script-Writer-62850)
- The [Barlow font](https://github.com/jpt/barlow) (Regular and Semi Condensed Regular) is used for text
- The [Foundation icon font](https://zurb.com/playground/foundation-icon-fonts-3) is used for all icons
- Album art placeholder is based on a [design by CmdRobot](http://fav.me/d7kpm65)

All credits are due, as well as my sincere thanks!
