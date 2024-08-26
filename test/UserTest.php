<?php

use PHPUnit\Framework\TestCase;
use App\User;

class UserTest extends TestCase
{
    public function testUserCreation(): void
    {
        $user = new User('John Doe', 'john@example.com', 'password');
        $this->assertEquals('John Doe', $user->getName());
        $this->assertEquals('john@example.com', $user->getEmail());
        $this->assertTrue(password_verify('password', $user->getPassword()));
    }
}
