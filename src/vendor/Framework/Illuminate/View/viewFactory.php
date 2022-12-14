<?php

namespace Illuminate\View;

use Illuminate\View\Engine;

class ViewFactory {

    protected $engine;

    protected $extensions = [
        'sword.php' => 'sword',
        'php' => 'php',
        'scss' => 'file',
        'ts' => 'file',
    ];

    public function make($view, $data) {

        $content = $this->getContent($view);
        
        $this->engine = new Engine($content, $data);
        $result = $this->view($content, $data);

        return $result;

    }

    private function view($content, $data) {

        $view = $this->engine->make();
        return $view;

    }

    private function getContent($view) {

        $files = glob('../app/Views/*');
        
        foreach($files as $file) {
            
            $explodedFile = explode('/', $file);
            $filename = $explodedFile[count($explodedFile)-1];
            $explodedFileName = explode('.', $filename);
            $name = $explodedFileName[0];
            $extend = implode('.',array_slice($explodedFileName, 1));
            
            

            if ($name === $view) {

                return file_get_contents($file);

            }
            
        }
        
    }

}
