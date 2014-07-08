<?php

use Barrel\Entities\User;

class UserEntityTest extends TestCase {

    public function setUp()
    {
        parent::setup();

        $user = new User;
        $user->username = 'Example';
        $user->email = 'example@example.com';
        $user->password = 'password';

        $this->user = $user;
    }

    public function tearDown()
    {
        unset($this->user);
    }

    public function testEntityIsInstanceOfBarrelModel()
    {
        $this->assertInstanceOf('Barrel\Database\Model', $this->user);
    }

    public function testEntityCanNotBeSavedWithoutUsername()
    {
        $user = $this->user;

        $user->username = '';

        $this->assertFalse($user->validate());
    }

    public function testEntityCanNotBeSavedIfUsernameIsTooShort()
    {
        $user = $this->user;

        $user->username = 'usr';

        $this->assertFalse($user->validate());
    }

    public function testEntityCanNotBeSavedIfDuplicated()
    {
        $user = $this->user;

        $user->save();

        $duplicate = $this->user;

        $this->assertFalse($duplicate->validate());
    }

    public function testEntityCanNotBeSavedWithoutEmail()
    {
        $user = $this->user;

        $user->email = '';

        $this->assertFalse($user->validate());
    }

    public function testEntityCanNotBeSavedWithInvalidEmailFormat()
    {
        $user = $this->user;

        $user->email = 'this is not an email';

        $this->assertFalse($user->validate());
    }

    public function testEntityCanNotBeSavedWithoutPassword()
    {
        $user = $this->user;

        $user->password = '';

        $this->assertFalse($user->validate());
    }

    public function testEntityCanNotBeSavedIfPasswordIsTooShort()
    {
        $user = $this->user;

        $user->password = 'pwd';

        $this->assertFalse($user->validate());
    }

    public function testEntityCanBeSavedWithValidAttributes()
    {
        $user = $this->user;

        $this->assertTrue($user->validate());
    }

    public function testEntityCanBeUpdated()
    {
        $user = $this->user;
        $user->save();

        $user->email = 'new@example.com';

        $this->assertTrue($user->save());
    }

}