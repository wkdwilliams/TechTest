<?php

namespace Tests\Unit;

use App\Models\User;
use Faker\Factory;
use Illuminate\Support\Facades\Session;
use PHPUnit\Framework\TestCase;

class UserTest extends \Tests\TestCase
{
    /**
     * Test the registration
     *
     * @return void
     */
    public function test_register()
    {
        $fake = Factory::create();
        $email = $fake->email;

        $data = [
            'name'              => $fake->firstName,
            'last_name'         => $fake->lastName,
            'email'             => $email,
            'password'          => $fake->password,
            'mobile'            => $fake->phoneNumber,
            'DOB'               => $fake->date('d/m/Y'),
            'special_spacify'   => $fake->randomAscii,
            'member_card'       => $fake->randomNumber(),
            'expiration_day'    => $fake->date('d/m/Y'),
            'address'           => $fake->address
        ];

        $this->post('/th/member/register/create', $data);

        $this->assertDatabaseHas('users', [
            'email' => $email
        ]);

    }

}
