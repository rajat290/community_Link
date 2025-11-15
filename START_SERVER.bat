@echo off
echo Starting CommunityLink Server...
echo.
echo Server will be available at: http://localhost:8765
echo.
echo Press Ctrl+C to stop the server
echo.
cd /d %~dp0
php -S localhost:8765 -t webroot
pause

