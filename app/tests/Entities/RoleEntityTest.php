<?php

use Lablog\Entities\Role;

class RoleEntityTest extends TestCase {

    public function setUp()
    {
        parent::setUp();

        $role = new Role;
        $role->name = 'admin';

        $this->role = $role;
    }

    public function tearDown()
    {
        unset($this->role);
    }

    public function testEntityIsInstanceOfLablogModel()
    {
        $this->assertInstanceOf('Lablog\Database\Model', $this->role);
    }

    public function testEntityCanNotBeSavedWithoutRoleName()
    {
        $role = $this->role;

        $role->name = '';

        $this->assertFalse($role->validate());
    }

    public function testEntityCanNotBeSavedIfRoleNameIsTooShort()
    {
        $role = $this->role;

        $role->name = 'R';

        $this->assertFalse($role->validate());
    }

    public function testEntityCanNotBeSavedIfDuplicate()
    {
        $role = $this->role;
        $role->save();

        $duplicate = $this->role;

        $this->assertFalse($duplicate->validate());
    }

    public function testEntityCanNotBeSavedIfParentIDIsNotNumber()
    {
        $role = $this->role;

        $role->parent_id = 'Hello';

        $this->assertFalse($role->validate());
    }

}