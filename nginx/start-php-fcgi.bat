@ECHO OFF
ECHO Starting PHP FastCGI...
set PATH=C:\nginx\PHP;%PATH%
c:\bin\RunHiddenConsole.exe C:\nginx\PHP\php-cgi.exe -b 127.0.0.1:9000