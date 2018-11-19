### SET FOLDER TO WATCH + FILES TO WATCH + SUBFOLDERS YES/NO
    $watcher = New-Object System.IO.FileSystemWatcher
    ### Add the folder drive to monitor
    ### Such as C:\Folder
    $watcher.Path = "Add_Path_Here"
    $watcher.Filter = "*.*"
    $watcher.IncludeSubdirectories = $true
    $watcher.EnableRaisingEvents = $true  

### DEFINE ACTIONS AFTER AN EVENT IS DETECTED
    $action = { $path = $Event.SourceEventArgs.FullPath
                $FileName = $Event.SourceEventArgs.Name
                $changeType = $Event.SourceEventArgs.ChangeType
                $logline = "$(Get-Date),$changeType,$path,$FileName"
                ### Add The log.txt file Destination Folder
                ### Such as C:\Folder\log.txt
                Add-content "Add_Path_Here" -value $logline
              }    
### DECIDE WHICH EVENTS SHOULD BE WATCHED 
    Register-ObjectEvent $watcher "Created" -Action $action
    ### Add the delay time to execute by seconds
    while ($true) {sleep 4}