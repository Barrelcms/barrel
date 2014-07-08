<?php

use Barrel\Entities\Profile;

class ProfileEntityTest extends TestCase {

    public function setUp()
    {
        parent::setUp();

        $profile = new Profile;
        $profile->user_id = 1;
        $profile->first_name = 'Joe';
        $profile->last_name = 'Bloggs';
        $profile->bio = 'Lorem ipsum dolor sit amet.';

        $this->profile = $profile;
    }

    public function tearDown()
    {
        unset($this->profile);
    }

    public function testEntityIsInstanceOfBarrelModel()
    {
        $this->assertInstanceOf('Barrel\Database\Model', $this->profile);
    }

    public function testEntityCanNotBeSavedIfUserIDIsNull()
    {
        $profile = $this->profile;

        $profile->user_id = null;

        $this->assertFalse($profile->validate());
    }

    public function testEntityCanNotBeSavedIfUserIDIsNotUnique()
    {
        $profile = $this->profile;
        $profile->save();

        $duplicate = $this->profile;

        $this->assertFalse($duplicate->validate());
    }

    public function testEntityCanNotBeSavedIfFirstNameIsTooShort()
    {
        $profile = $this->profile;

        $profile->first_name = 'J';

        $this->assertFalse($profile->validate());
    }

    public function testEntityCanNotBeSavedIfLastNameIsTooShort()
    {
        $profile = $this->profile;

        $profile->last_name = 'B';

        $this->assertFalse($profile->validate());
    }

    public function testEntityCanBeSavedWithValidAttributes()
    {
        $profile = $this->profile;

        $this->assertTrue($profile->validate());
    }

    public function testEntityCanBeUpdated()
    {
        $profile = $this->profile;
        $profile->save();

        $profile->bio = 'Lorem ipsum.';

        $this->assertTrue($profile->save());
    }

}