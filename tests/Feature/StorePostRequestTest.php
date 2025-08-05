<?php

namespace Tests\Feature;

use App\Http\Requests\StorePostRequest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class StorePostRequestTest extends TestCase
{
    use RefreshDatabase;

    public function test_validation_rules()
    {
        $request = new StorePostRequest();
        $rules = $request->rules();

        $this->assertEquals([
            'user_id' => 'required|exists:users,id',
            'body' => 'required|string',
        ], $rules);
    }

    public function test_validation_passes()
    {
        $user = User::factory()->create();
        $data = ['user_id' => $user->id, 'body' => 'Test post content'];
        $validator = Validator::make($data, (new StorePostRequest())->rules());

        $this->assertTrue($validator->passes());
    }
}