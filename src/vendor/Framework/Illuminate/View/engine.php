<?php

namespace Illuminate\View;

class Engine {

    protected $content;

    protected $data;

    public $variables;

    public function __construct($content, $data) {

        $this->content = $content;
        $this->data = $data;

    }

    public function make() {

        return $this->get();

    }

    // get the evaluated contents.
    private function get() {

        $pattern = '/\{\{.*\}\}/';
        preg_match_all($pattern, $this->content, $codes);

        $results = $this->execute($codes[0]);
        //$evaledContent = $this->data;
        $evaledContent = '';
        return $evaledContent;

    }

    private function execute($codes) {

        $pattern = '/{?<=\{}.*?{?=\}}/';
        $output = preg_replace($pattern, '', $codes[0]);
        var_dump($output);
        $result = 'execute';
        return $result;

    }

}
