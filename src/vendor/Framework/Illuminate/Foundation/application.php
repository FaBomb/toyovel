<?php

namespace Illuminate\Foundation;

class Application {

    // 一時的にクラスパスを受け取ったらnewして返すだけの機能のみ実装
    public function make($class) {
        return new $class;
    }

}
