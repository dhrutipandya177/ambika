<?php
// Get Affliate unique affliate code
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Models\Notification;

if(!function_exists('pushNotification')){
    function pushNotification($notification,$receiver)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $serverApiKey = config('app.fcm_key');
        $headers = array(
            'Content-Type:application/json',
            'Authorization:key=' . $serverApiKey
        );
        $parameter=json_decode($notification->parameter,true);
        //$image=(isset($parameter['notification_image']) && $parameter['notification_image'] != '')?$parameter['notification_image']:'';
        $message = [
            'id'=>$notification->id,
            'message'=>$notification->message,
            'parameter'=>json_decode($notification->parameter,true),
            'receiver_id'=>$notification->receiver_id,
            'type'=>$notification->type,
            //'attachment'=>$image,
            //'media_type'=>"image",
        ];

        $dataTemp = [
            'title' => "Ambica",
            'data' => $message
        ];

        if($receiver->device_type == 'A' && $receiver->device_token != '') {
            $data = array(
                'to' => $receiver->device_token,
                'data' => $dataTemp,
                'priority'=>'high'
            );
        }

        if($receiver->device_type == 'I' && $receiver->device_token != '') {
            $unreadNotification=Notification::where('read',0)->where('type','!=',99)->where('receiver_id',$notification->receiver_id)->count();
            $msg = array ('title' => config('app.name'), 'body' => $notification->message);
            $message = array(
                "message" => $notification->message,
                "data" => $message,
            );
            $data['registration_ids'] = array($receiver->device_token);
            $data['data'] = $message;
            $data['notification']['sound'] = "default";
            $data['notification']['title'] = "Yadi";
            $data['notification']['mutable_content'] = true;
            $data['notification']['category'] = "CustomSamplePush";
            $data['notification']['body'] = $notification->message;
            $data['notification']['badge'] = $unreadNotification;
        }
        if(isset($data) && $data != ''){
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);

            if ($headers)
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

            $response = curl_exec($ch);
            curl_close($ch);
            $response_arr =  json_decode($response, true);
            if($response_arr['success'] == 0) {
                Log::info('Push Notification Send Failed');
                //throw new \Exception('Push Notification Send Failed : ');
            }
        }

        return true;
    }
}
?>
