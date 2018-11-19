Automate Backup Files From Your Public Access Folder To AWS S3 Bucket Using AWS-PHP-SDK On Windows OS
========================================================================================================================
Developed by, [AZNEO LIMITED](http://az-neo.com)


Introduction
---------------

It helps to backup files from X minutes interval to your AWS S3 bucket using AWS-PHP-SDK. Simply upload your files to your public access folder and a PowerShell command file will monitor the files of the folder. After the X minutes interval it will check if any new files are created and it will entry into a log file for the new created file path and its name. Then another windows task scheduler will be loaded after every X minute delay and load the php file to upload the new created files to your AWS S3 bucket and entry into your aws-log entry files.


Requirements
---------------

It requires `PHP 5.5+` to work properly. Also need `PoweShell 4.0` or higher.

Setup Guide
--------------
1. Set the destination folder path to watch @`$watcher.Path` variable and set the log file destination folder @`Add-content` Section in StartMonitoring.ps1 file. Also, Please set time delay on the `sleep X`  at the bottom of the code.
2. In `app\config.php` file edit with your aws public key and private secret key.
3. In `index.php` file on your `s3->putObject` section given the S3 bucket name.
4. Run the `task.bat` on windows task scheduler.

Developer
--------------
1. [Mohiuddin Hyder Khan](https://www.linkedin.com/in/mohiuddin-khan-82469736/)(Advisor)
2. [Farhad Kamal](https://www.linkedin.com/in/farhad-kamal-865b6b60/)(Advisor)
3. [Shahriar Rashid Mahmud](https://github.com/Shahriar1824)(Developer)





