<?php 
$myfile = fopen("log.txt", "r");

while ($line = fgets($myfile)) {
    // <... Do your work with the line ...>
    $data[] = $line;
}

//$myfile_aws = fopen("logfile_aws.txt", "w");
$myfile_aws = fopen("logfile_aws.txt", "r");
while ($line_aws = fgets($myfile_aws)) {
    // <... Do your work with the line ...>
    $data_aws[] = $line_aws;
}

//fwrite($myfile_aws, $txt);
fclose($myfile_aws);
fclose($myfile);


// echo "<pre>";
// var_dump($data);
// var_dump($data_aws);
// echo "</pre>";


function findMissing( $data, $data_aws='', $n, $m=''){ 

      for ( $i = 0; $i < $n; $i++) 
      {
          //$myfile_aws_write_log = fopen("logfile_aws.txt", "w");
          if($data_aws != NULL){

            if (in_array($data[$i], $data_aws)){
                Continue; 
            }
            else{
                $new_data[] = $data[$i];
            }

          }
          else{
            $myfile_aws_write_log = "logfile_aws.txt";    
            file_put_contents($myfile_aws_write_log, $data[$i],FILE_APPEND);

            // $myfile_aws_write_log = fopen("logfile_aws.txt", "w");
            // fwrite($myfile_aws_write_log, $data[$i]);
            // fclose($myfile_aws_write_log);
          }
      }

      require("app/start.php");

      /*echo "<pre>";
      var_dump($new_data);
      echo "</pre>";
      die();*/

      if(isset($new_data)){
          foreach($new_data AS $new){
              $files = explode(",",$new);

              /*Upload a publicly accessible file. The file size and type are determined by the SDK.*/
              try {
                  $s3->putObject([
                      'Bucket' => 'pnl-employee-document',
                      'Key'    => $files[3],
                      'Body'   => fopen($files[2],'r'),
                      'ACL'    => 'public-read',
                  ]);
              }catch (Aws\S3\Exception\S3Exception $e) {
                  echo "There was an error uploading the file.\n";
              }

              $myfile_aws_write_log = "logfile_aws.txt";
              file_put_contents($myfile_aws_write_log, $new,FILE_APPEND);

          }
      }
  } 
  
  // Driver code 
  $n = count($data);
  $m = isset($data_aws)?count($data_aws):''; 
  findMissing($data, $data_aws, $n, $m); 
?>