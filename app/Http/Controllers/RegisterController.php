<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class RegisterController extends Controller
{
    /**
     * @return View
     */
    public function stepOne(): View
    {
        return $this->render('register_step_one');
    }

    public function stepTwo(Request $request)
    {
        return $this->render('register_step_two', $request->all());
    }

}
