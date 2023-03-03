<?php
namespace App\Classes;

class SendOtp
{
    private $subject;
    private $text;
    private $to;
    private $countryCode;

    public function subject($subject) {
        $this->subject = $subject;
        return $this;
    }
    
    public function text($text) {
        $this->text = $text;
        return $this;
    }
    
    public function to($countryCode, $to) {
        $this->countryCode = $countryCode;
        $this->to = $to;
        return $this;
    }

    public function send() {
    }

}


?>