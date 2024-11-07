<?php

namespace Hong\UnitTesting;

use PHPUnit\Framework\TestCase;
use Hong\UnitTesting\Model\User;

final class UserTest extends TestCase
{
    public function testClassConstructor()
    {
        $user = new User('John', 18);

        $this->assertSame('John', $user->name);
        $this->assertSame(18, $user->age);
        $this->assertEmpty($user->favorite_movies);
    }

    public function testTellName()
    {
        $user = new User('John', 18);

        $this->assertIsString($user->tellName());
        $this->assertStringContainsStringIgnoringCase('John', $user->tellName());
    }

    public function testTellAge()
    {
        $user = new User('John', 18);

        $this->assertIsString($user->tellAge());
        $this->assertStringContainsStringIgnoringCase('18', $user->tellAge());
    }

    public function testAddFavoriteMovie()
    {
        $user = new User('John', 18);

        $this->assertTrue($user->addFavoriteMovie('Avengers'));
        $this->assertContains('Avengers', $user->favorite_movies);
        $this->assertCount(1, $user->favorite_movies);
    }

    public function testRemoveFavoriteMovie()
    {
        $user = new User('John', 18);

        $this->assertTrue($user->addFavoriteMovie('Avengers'));
        $this->assertTrue($user->addFavoriteMovie('Justice League'));

        $this->assertTrue($user->removeFavoriteMovie('Avengers'));
        $this->assertNotContains('Avengers', $user->favorite_movies);
        $this->assertCount(1, $user->favorite_movies);
    }
}