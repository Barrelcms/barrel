<?php

use Barrel\Entities\Role;

class RoleEntityTest extends TestCase {

    public function setUp()
    {
        parent::setUp();

        $role = new Role;
        $role->name = 'admin';
        $role->parent_id = 2;
        $role->save();

        $parent = new Role;
        $parent->name = 'ParentRole';
        $parent->parent_id = 3;
        $parent->save();

        $this->parent = $parent;

        $main = new Role;
        $main->name = 'MainRole';
        $main->save();

        $this->main = $main;

        $this->role = $role;
    }

    public function tearDown()
    {
        unset($this->role);
    }

    public function testEntityIsInstanceOfBarrelModel()
    {
        $this->assertInstanceOf('Barrel\Database\Model', $this->role);
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

    public function testEntityCanReturnParent()
    {
        $role = $this->role;

        $this->assertEquals($this->parent->id, $role->parent()->id);
    }

    public function testEntityCanReturnParents()
    {
        $parents = $this->role->parents();

        $this->assertInstanceOf('Illuminate\Support\Collection', $parents);
    }

}