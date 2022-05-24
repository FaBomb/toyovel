<?php

namespace Illuminate\Http\Message;

class Response {

    public $content;

    public $request;

    public function __construct($request, $content) {

        $this->request = $request;
        $this->content = $content;

    }

    public function send() {
    
        $this->sendHeaders();
        $this->sendContent();

    }

    private function sendHeaders() {

        header('Content-Type: text/html; charset=UTF-8');
        //時間があれば他にステータスコード、Cookie、なども

    }

    private function sendContent() {

        echo $this->content;

    }

}
