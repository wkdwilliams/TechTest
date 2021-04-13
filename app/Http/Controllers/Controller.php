<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use \Illuminate\Contracts\View\View as ViewContract;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param string $view
     * @param array $data
     * @return ViewContract
     */
    protected function render(string $view, array $data = []): ViewContract{
        return View::make($view, $data);
    }
}
