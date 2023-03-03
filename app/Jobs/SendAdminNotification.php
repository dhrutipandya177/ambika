<?php

namespace App\Jobs;

use App\Models\AdminNotification;
use App\Models\Notification;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class SendAdminNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $notification;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(AdminNotification $notification)
    {
        $this->notification=$notification;
        //print_r($notification);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //$users=User::where('is_admin',null)->get();
        //echo "<pre>"; print_r($request->users); exit;
        //$users=User::where('verification_at','=',1)->get();

        if(!empty($request->users)){
            $userslist=$request->users;
            $users=User::whereIn('id',$userslist)->get();
        }else{
           $users=User::where('verification_at','=',1)->get(); 
        }
        
        if(count($users) > 0){
            foreach ($users as $u){
                $notification=Notification::create([
                    'message'=> $this->notification->title,
                    'type'=>1,
                    'parameter'=>json_encode(['notification_title'=>$this->notification->title,'notification_desc'=>$this->notification->description]),
                    //'sender_id'=>null,
                    'receiver_id'=>$u->id
                ]);
                pushNotification($notification,$u);
            }
        }
    }
}
