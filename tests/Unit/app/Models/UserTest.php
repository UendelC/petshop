<?php

namespace Tests\Unit\app\Models;

use App\Models\File;
use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testUserHasItsAvatar()
    {
        $file = File::factory()->create();
        $user = User::factory()->create(['avatar' => $file->uuid]);

        $this->assertEquals($file->uuid, $user->avatar);
        $this->assertEquals($user->avatar()->first()->uuid, $file->uuid);
    }

    public function testUserHasItsOrders()
    {
        $user = User::factory()->create();
        $orders = $user->orders()->saveMany(Order::factory(2)->make());

        $this->assertEquals($user->orders()->first()->id, $orders->first()->id);
    }
}
