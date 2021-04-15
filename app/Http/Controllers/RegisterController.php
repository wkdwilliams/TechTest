<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;

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

    public function create(Request $request){
        User::create([
            'first_name'        => $request->get('name'),
            'last_name'         => $request->get('last_name'),
            'email'             => $request->get('email'),
            'password'          => $request->get('password'), // Storing password as plain text for now.
            'mobile'            => $request->get('mobile'),
            'DOB'               => $request->get('DOB'),
            'spacify'           => $request->get('special_spacify'),
            'member_card'       => $request->get('member_card'),
            'expiration_date'   => $request->get('expiration_day'),
            'address'           => $request->get('address'),
        ]);

        return Redirect::to('/th/member/register/success');
    }

    /**
     * @return View
     */
    public function success(): View{
        return $this->render('register_step_success');
    }

}
