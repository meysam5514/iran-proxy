<?php
// ====================================================================
error_reporting(0);
header('Content-type: application/json;');


$get=file_get_contents('https://www.proxynova.com/proxy-server-list/country-ir/');
preg_match_all('#<script>document.write((.*?));</script>#',$get,$ip);
preg_match_all('#<td align="left">
                                    (.*?)
                            </td>#',$get,$port);
preg_match_all('#<small>(.*?) ms</small>#',$get,$ping);                            
             $arr = array();
for($i=0;$i<=count($ip[2])-1;$i++){
$rep = str_replace(["('","')"],null,$ip[2][$i]);           
$rep1 = str_replace(["' + '"],null,$rep);               
$arr [$i]['ip']= $rep1;
$arr [$i]['port']= $port[1][$i];
$arr [$i]['ping']= $ping[1][$i];
} 
// ====================================================================
echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@meysam_s71',  'Results' => $arr], 448);





