@echo off
cd /d "C:\xampp\htdocs\thesis2\ffmpeg-8.0-essentials_build\bin"
ffmpeg.exe -i rtsp://admin01:admin123@192.168.1.5:554/stream1 ^
-c:v libx264 -c:a aac -f hls -hls_time 2 -hls_list_size 5 -hls_flags delete_segments ^
"C:\xampp\htdocs\stream\index.m3u8"
pause
