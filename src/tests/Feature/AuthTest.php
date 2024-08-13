<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function test_register_view()
    {
        $response = $this->get("/register");
        $response->assertStatus(200);
    }

    public function test_register_success()
    {
        $email = "test" . rand() . "@example.com";
        $password = "password";
        User::createGeneralUser($email, $password);
        $this->assertDatabaseHas("users",[
            "email" => $email,
        ]);
    }

    public function test_register_failure()
    {
        $email = "";
        $password = "password";
        $response = $this->post("register",[
            "email" => $email,
            "password" => $password,
        ]);

        $response->assertSessionHasErrors(["email","password"]);
    }

    public function test_login_view()
    {
        $response = $this->get("/login");
        $response->assertStatus(200);
    }

    public function test_login_success()
    {
        $email = "test@example.com";
        $password = "password";
        $response = $this->post("login",[
            "email" => $email,
            "password" => $password,
        ]);
        $response->assertRedirect("/dashboard");
        $this->assertAuthenticated();
    }

    public function test_login_failure()
    {
        $email = "failure@example.com";
        $password = "password";
        $response = $this->post("/login",[
            "email" => $email,
            "password" => $password,
        ]);

        $response->assertSessionHasErrors();
        $this->assertGuest();
    }


}

