<?php

namespace Illuminate\Http\Contracts;

interface Kernel {

    public function handle($request);

    public function terminate($request, $response);

}
