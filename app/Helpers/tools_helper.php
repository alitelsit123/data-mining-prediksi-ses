<?php

function alertBS($title, $message, $type)
{
  return '<div class="alert alert-'.$type.' alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>'.$title.'</strong> '.$message.'
                </div>';
}

function sweetAlert($title = '', $text = '', $type = '', $timer = 99999, $showConBtn = true)
{
  return "<script>
        let title = '$title';
        let text = '$text'; 
        let icon = '$type';
        let timer = '$timer';
        let showConfirmButton = '$showConBtn';
        Swal.fire({title, text, icon, showConfirmButton, timer})
        </script>";
}


function sweetAlertHref($title = '', $text = '', $type = '', $href = '')
{
  return "<script>
        let title = '$title';
        let text = '$text'; 
        let type = '$type';
        Swal.fire(title,text,type).then(function() {
                window.location = '$href';
            });
        </script>";
}

function htmlPure($dirtyHtml)
{
  $config = HTMLPurifier_Config::createDefault();
  $purifier = new HTMLPurifier($config);
  return $purifier->purify($dirtyHtml);
}

function getUniqueString($insertId)
{
  helper('text');
  $coun = str_pad($insertId, 4, 0, STR_PAD_LEFT); // Updated line to include '0'
  $id = 'DESTINASI-';
  return strtoupper($id.$coun.'-'.strtoupper(random_string('alnum','4')));
}

function encryptParam($string)
{

// Store the cipher method
  $ciphering = "AES-128-CTR";

// Use OpenSSl Encryption method
  $iv_length = openssl_cipher_iv_length($ciphering);
  $options = 0;

// Non-NULL Initialization Vector for encryption
  $encryption_iv = '7891011121011214';

// Store the encryption key
  $encryption_key = "beliscmantabjiwaraga";

// Use openssl_encrypt() function to encrypt the data
  return openssl_encrypt($string, $ciphering, $encryption_key, $iv_length, $encryption_iv);

}

function decryptParam($cipher)
{
  $ciphering = "AES-128-CTR";
  $iv_length = openssl_cipher_iv_length($ciphering);
  $options = 0;

  $decryption_iv = '7891011121011214';

// Store the decryption key
  $decryption_key = "beliscmantabjiwaraga";

// Use openssl_decrypt() function to decrypt the data
  return (int) openssl_decrypt ($cipher, $ciphering, $decryption_key, $iv_length, $decryption_iv);
}

function googleCaptchaVerification($recaptchaResponse, $ipAddress){
  $secret= getenv('google.CaptchaSecretKey');
  $credential = array(
    'secret' => $secret,
    'remoteip' => $ipAddress,
    'response' => $recaptchaResponse
  );
  $verify = curl_init();
  curl_setopt($verify, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
  curl_setopt($verify, CURLOPT_POST, true);
  curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
  curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($verify);

  $status= json_decode($response, true);
  if($status['success']){
    return true;
  } else {
    return false;
  }
}

function formatMillisecondsHelper($milliseconds) {
  $seconds = floor($milliseconds / 1000);
  $minutes = floor($seconds / 60);
  $hours = floor($minutes / 60);
  $milliseconds = $milliseconds % 1000;
  $seconds = $seconds % 60;
  $minutes = $minutes % 60;

  $format = '%u:%02u:%02u';
  $time = sprintf($format, $hours, $minutes, $seconds, $milliseconds);
  $dirtyTime = rtrim($time, '0');

  $newDuration = explode(':', $dirtyTime);
  $jam = (strlen($newDuration[0]) == 1)? '0'.$newDuration[0] : $newDuration[0] ;
  $detik = (strlen($newDuration[2]) == 1)? '0'.$newDuration[2] : $newDuration[2] ;
  $durationFix = $jam.' Jam '.$newDuration[1].' Menit'.' '.$detik.' Detik';

  return $durationFix;
}
