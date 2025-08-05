<?php

namespace Tests\Feature;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class StoreUserRequestTest extends TestCase
{
    use RefreshDatabase;

    public function test_validation_rules()
    {
        $request = new StoreUserRequest();
        $rules = $request->rules();

        $this->assertEquals([
            'name' => 'required|string|max:255',
        ], $rules);
    }

    public function test_validation_passes()
    {
        $data = ['name' => 'Test User'];
        $validator = Validator::make($data, (new StoreUserRequest())->rules());

        $this->assertTrue($validator->passes());
    }

    public function test_validation_fails_without_name()
    {
        $data = [];
        $validator = Validator::make($data, (new StoreUserRequest())->rules());

        $this->assertFalse($validator->passes());
        $this->assertTrue($validator->errors()->has('name'));
    }
}