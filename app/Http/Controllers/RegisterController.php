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

    /**
     * @param Request $request
     * @return View
     */
    public function stepTwo(Request $request): View
    {
        return $this->render('register_step_two', $request->all());
    }

    /**
     * @param Request $request
     * @return View
     */
    public function stepThree(Request $request): View
    {
        $verifyInfo = $request->all();
        $newInfo    = [];
        $blacklist  = ['password', 'confirm_password', '_token'];

        foreach($verifyInfo as $i => $info){
            if(in_array($i, $blacklist, false)) {
                continue;
            }

            $newInfo[] = [ucfirst(str_replace('_', ' ', $i)), $info];
        }

        return $this->render('register_step_three', [
            'verify_info' => $newInfo,
            'orig_info'   => $verifyInfo
        ]);
    }

}
