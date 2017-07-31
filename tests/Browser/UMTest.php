<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class UMTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    
    use DatabaseMigrations;
    
    public function testViewUsers()
    {
        $this->seed('UsersTableSeeder');
        $this->browse(function ($first) {
            $first->loginAs(User::find(1))
                ->visit('/admin/users')
                ->assertSee("You don't have permission to view this page.")
                
                ->loginAs(User::find(3))
                ->visit('/admin/users')
                ->assertSee("Users");
        });
    }
    
    public function testEditUser()
    {
        $this->seed('UsersTableSeeder');
        $this->browse(function ($first) {
            $first->loginAs(User::find(1))
                ->visit('/admin/users/edit/1')
                ->assertSee("You don't have permission to view this page.")
                
                ->loginAs(User::find(3))
                ->visit('/admin/users/edit/1')
                ->assertSee("Edit User")
                ->value('#name', 'Update Test')
                ->value('#email', 'test-email@test.com')
                ->value('#role', 'User')
                ->press('UPDATE USER')
                ->assertSee('User updated successfully.')
                ->assertSee("Update Test");
        });
    }
    
    public function testDeleteUser()
    {
        $this->seed('UsersTableSeeder');
        $this->browse(function ($first) {
            $first->loginAs(User::find(1))
                ->visit('/admin/users/delete/1')
                ->assertSee("You don't have permission to view this page.")
                
                ->loginAs(User::find(3))
                ->visit('/admin/users/delete/1')
                ->visit('/admin/users')
                ->assertDontSee('John Smith');
        });
    }
    
    public function testAddUser()
    {
        $this->seed('UsersTableSeeder');
        $this->browse(function ($first) {
            $first->loginAs(User::find(1))
                ->visit('/register')
                ->assertSee("You don't have permission to view this page.")
                
                ->loginAs(User::find(3))
                ->visit('/register')
                ->assertSee('Register')
                ->value('#name', 'Add Test')
                ->value('#email', 'add-email-test@test.com')
                ->value('#password', 'testtest1')
                ->value('#password-confirm', 'testtest1')
                ->press('REGISTER USER')
                ->visit('/admin/users')
                ->assertSee('Add Test');
        });       
    }
}
