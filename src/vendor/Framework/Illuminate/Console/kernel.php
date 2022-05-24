<?php

namespace Illuminate\Console;

use Illuminate\Database\Migrations\Kernel as MigrationKernel;

class Kernel {

    public $command;

    public $fileName;

    public $commands = [
        'make:controller'=>'makeController',
        'make:model'=>'makeModel',
        'make:view'=>'makeView',
        'make:migration'=>'makeMigration',
        'migrate'=>'migrate'
    ];

    public function handle($inputArgvs) {

        if (isset($inputArgvs[1])) {

            $this->command = $inputArgvs[1];    

        }

        if (isset($inputArgvs[2])) {

            $this->fileName = $inputArgvs[2];    

        }
        
        $this->getCommand($this->command);

    }

    private function getCommand($arg) { 
        
        if (isset($this->commands[$arg])) {

            $command = $this->commands[$arg];
            $this->$command();

        } else {

            echo 'Not Found Method', PHP_EOL;

        }

    }

    private function migrate() {

        
        $migrationFiles = glob(dirname(__DIR__, 4).'/app/Migrations/*');
        $migrationFile = end($migrationFiles);

        $migration = require_once $migrationFile;
        $migration->up();

    }

    private function makeController() {

        $fileName = $this->fileName;
        $createPath = dirname(__FILE__, 5).'/app/Controllers/';
        $stubPath = dirname(__FILE__).'/stubs/controller.stub';

        $this->makeFile($fileName, $createPath, $stubPath, 'controller');

    }

    private function makeModel() {

        $fileName = $this->fileName;
        $createPath = dirname(__FILE__, 5).'/app/Models/';
        $stubPath = dirname(__FILE__).'/stubs/model.stub';

        $this->makeFile($fileName, $createPath, $stubPath, 'model');

    }
    
    private function makeView() {

        $fileName = $this->fileName.'.sword';
        $createPath = dirname(__FILE__, 5).'/app/Views/';
        $stubPath = dirname(__FILE__).'/stubs/view.stub';

        $this->makeFile($fileName, $createPath, $stubPath, 'view');

    }

    private function makeMigration() {

        $fileName = $this->fileName;
        $createPath = dirname(__FILE__, 5).'/app/Migrations/';
        $stubPath = dirname(__FILE__).'/stubs/migration.stub';

        $this->makeFile($fileName, $createPath, $stubPath, 'migration');
        
    }

    private function makeFile($name, $createPath, $stubPath, $type) {

        $file = $name.'.php';
        $newfilePath = $createPath.$file;
        $content = file_get_contents($stubPath);

        if ($type !== 'view' ) {
            
            $convertName = ucwords($name);
            if ($type === 'migration') {

                $convertName = $name;

            }
            $content = $this->inssertName($convertName, $content);

        }

        if ($type === 'migration') {

            $newfilePath = $createPath.date('Y_m_d_H_i_s_').'migration.php';

        }
        
        if (!file_exists($newfilePath)) {

            echo $newfilePath.'を作成しました', PHP_EOL;

            touch($newfilePath);
            file_put_contents($newfilePath, $content);

        } else {

            echo $newfilePath.'は、すでに存在しています';

        }

    }

    private function inssertName($name, $content) {

        return str_replace('{{ name }}', $name, $content);

    }

}
