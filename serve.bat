@echo off
echo ========================================================
echo   Glamp Inn Valley - Local Development Server
echo   Running at: http://localhost:8000
echo   Press Ctrl+C to stop the server.
echo ========================================================
php -S localhost:8000 -t public_html router.php
