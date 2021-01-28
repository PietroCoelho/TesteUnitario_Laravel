<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *@test
     * @return void
     */
    protected $user;
    public function check_if_user_columns_is_correct(User $user)
    {
        $this->user = $user;

        $expected = [
            'name',
            'email',
            'password'
        ];
        $arrayCompared = array_diff($expected, $user->getFillable());
        $this->assertEquals(0, count($arrayCompared));
    }
}
