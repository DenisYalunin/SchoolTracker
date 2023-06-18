@echo off
rem START or STOP Services
rem ----------------------------------
rem Check if argument is STOP or START

if not ""%1"" == ""START"" goto stop

if exist F:\site\hypersonic\scripts\ctl.bat (start /MIN /B F:\site\server\hsql-sample-database\scripts\ctl.bat START)
if exist F:\site\ingres\scripts\ctl.bat (start /MIN /B F:\site\ingres\scripts\ctl.bat START)
if exist F:\site\mysql\scripts\ctl.bat (start /MIN /B F:\site\mysql\scripts\ctl.bat START)
if exist F:\site\postgresql\scripts\ctl.bat (start /MIN /B F:\site\postgresql\scripts\ctl.bat START)
if exist F:\site\apache\scripts\ctl.bat (start /MIN /B F:\site\apache\scripts\ctl.bat START)
if exist F:\site\openoffice\scripts\ctl.bat (start /MIN /B F:\site\openoffice\scripts\ctl.bat START)
if exist F:\site\apache-tomcat\scripts\ctl.bat (start /MIN /B F:\site\apache-tomcat\scripts\ctl.bat START)
if exist F:\site\resin\scripts\ctl.bat (start /MIN /B F:\site\resin\scripts\ctl.bat START)
if exist F:\site\jetty\scripts\ctl.bat (start /MIN /B F:\site\jetty\scripts\ctl.bat START)
if exist F:\site\subversion\scripts\ctl.bat (start /MIN /B F:\site\subversion\scripts\ctl.bat START)
rem RUBY_APPLICATION_START
if exist F:\site\lucene\scripts\ctl.bat (start /MIN /B F:\site\lucene\scripts\ctl.bat START)
if exist F:\site\third_application\scripts\ctl.bat (start /MIN /B F:\site\third_application\scripts\ctl.bat START)
goto end

:stop
echo "Stopping services ..."
if exist F:\site\third_application\scripts\ctl.bat (start /MIN /B F:\site\third_application\scripts\ctl.bat STOP)
if exist F:\site\lucene\scripts\ctl.bat (start /MIN /B F:\site\lucene\scripts\ctl.bat STOP)
rem RUBY_APPLICATION_STOP
if exist F:\site\subversion\scripts\ctl.bat (start /MIN /B F:\site\subversion\scripts\ctl.bat STOP)
if exist F:\site\jetty\scripts\ctl.bat (start /MIN /B F:\site\jetty\scripts\ctl.bat STOP)
if exist F:\site\hypersonic\scripts\ctl.bat (start /MIN /B F:\site\server\hsql-sample-database\scripts\ctl.bat STOP)
if exist F:\site\resin\scripts\ctl.bat (start /MIN /B F:\site\resin\scripts\ctl.bat STOP)
if exist F:\site\apache-tomcat\scripts\ctl.bat (start /MIN /B /WAIT F:\site\apache-tomcat\scripts\ctl.bat STOP)
if exist F:\site\openoffice\scripts\ctl.bat (start /MIN /B F:\site\openoffice\scripts\ctl.bat STOP)
if exist F:\site\apache\scripts\ctl.bat (start /MIN /B F:\site\apache\scripts\ctl.bat STOP)
if exist F:\site\ingres\scripts\ctl.bat (start /MIN /B F:\site\ingres\scripts\ctl.bat STOP)
if exist F:\site\mysql\scripts\ctl.bat (start /MIN /B F:\site\mysql\scripts\ctl.bat STOP)
if exist F:\site\postgresql\scripts\ctl.bat (start /MIN /B F:\site\postgresql\scripts\ctl.bat STOP)

:end

