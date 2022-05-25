<?php

namespace Illuminate\View;

class Engine {

    protected $content;

    protected $data;

    public function __construct($content, $data) {

        $this->content = $content;
        $this->data = $data;

    }

    public function make() {

        return $this->get();

    }

    // get the evaluated contents.
    private function get() {

        $pattern = '/\{\{\$.*\}\}/';

        preg_match_all($pattern, $this->content, $codes);

        $results = $this->getVariables($codes[0]);
        $evaledContent = str_replace($codes[0], $results, $this->content);
        return $evaledContent;

        // ↓phpのコードを実行し、結果を差し替える処理
        //$results = $this->execute($codes[0]);
        //$evaledContent = str_replace($codes[0], $results, $this->content);
        //return $evaledContent;

    }

    private function getVariables($variables) {

        $results = [];

        foreach ($variables as $variable) {

            $variable = trim($variable);

            $embbeddedVariable = substr($variable, 3, strlen($variable)-5);

            array_push($results, $this->data[$embbeddedVariable]);

        }

        return $results;

    }

    private function execute($codes) {

        $results = [];

        // 変数を使えるようにする

        foreach ($codes as $code) {

            $embbeddedCode = substr($code, 2, strlen($code)-4);
            
            ob_start();

            eval($embbeddedCode);

            array_push($results, ob_get_contents());

            ob_end_clean();


        }

        return $results;

    }


}
