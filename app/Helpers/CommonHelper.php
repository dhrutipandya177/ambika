<?php
//app/Helpers/CommonHelper.php
namespace App\Helpers;
 
use Illuminate\Support\Facades\DB;
 
class CommonHelper {
    /**
     * @param int $user_id User-id
     * 
     * @return string
     */
    public static function curlCall($url, $type = null, $postfields = null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        if ($type == 'post') {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }
}