<?php

namespace Illuminate\View;

class Engine {

    protected $content;

    protected $data;

    public function __construct($content, $data) {

        $this->content = $content;
        $this->data = $data;

        return $this->make();

    }

    public function make() {

        return $this->content;

    }

}
