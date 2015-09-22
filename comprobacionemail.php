<?PHP
session_start();
$email=$_GET["email"];
$bolmailcorr='0';
function check_email_mx($email) {
 if( (preg_match('/(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)/', $email)) ||
 (preg_match('/^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,3}|[0-9]{1,3})(\]?)$/',$email)) ) {
 $host = explode('@', $email);
 if(checkdnsrr($host[1].'.', 'MX') ) return true;
 if(checkdnsrr($host[1].'.', 'A') ) return true;
 if(checkdnsrr($host[1].'.', 'CNAME') ) return true;
 }
 return false;
 }
 if (!function_exists('checkdnsrr')) {
 function checkdnsrr($host, $type = '') {
 if(!empty($host)) {
 if($type == '') $type = "MX";
 @exec("nslookup -type=$type $host", $output);
 while(list($k, $line) = each($output)) {
 if(eregi("^$host", $line)) {
 return true;
 }
 }
 return false;
 }
 }
 }
if(check_email_mx($email))
$bolmailcorr='1';
if($bolmailcorr=='1'){
echo "1";
}else{
echo "0";
}
?>
