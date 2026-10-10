@echo off
setlocal
cd /d "%~dp0"
title StudyFlow Laravel Auth CRUD
set "HERD_BIN=%USERPROFILE%\.config\herd\bin"
if exist "%HERD_BIN%\php.bat" set "PATH=%HERD_BIN%;%PATH%"
echo STUDYFLOW LARAVEL AUTHENTICATION AND CRUD
where php >nul 2>nul
if errorlevel 1 (echo PHP NOT FOUND. Check Laravel Herd CLI setup.& pause & exit /b 1)
where composer >nul 2>nul
if errorlevel 1 (echo COMPOSER NOT FOUND. Check Laravel Herd CLI setup.& pause & exit /b 1)
if not exist .env copy /Y .env.example .env >nul
if not exist database\database.sqlite type nul >database\database.sqlite
call composer install --no-interaction
if errorlevel 1 goto :failed
php artisan key:generate --force
if errorlevel 1 goto :failed
php artisan migrate --force
if errorlevel 1 goto :failed
where npm >nul 2>nul
if not errorlevel 1 (
 call npm install
 if errorlevel 1 goto :failed
 call npm run build
 if errorlevel 1 goto :failed
)
echo OPEN http://127.0.0.1:8000
php artisan serve --host=127.0.0.1 --port=8000
goto :end
:failed
echo SETUP FAILED. Read the error above.
pause
:end
endlocal
