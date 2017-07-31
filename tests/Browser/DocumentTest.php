<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class documentTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    use DatabaseMigrations;

    public function testDocUpload()
    {
        $this->seed('DatabaseSeeder');
        $this->browse(function ($first) {
            $first->loginAs(User::find(1))
                ->visit('/document/add')
                ->value('#documentName', 'Test')
                ->value('#documentVersion', '1')
                ->value('#category', 'HR')//Doesn't use dropdown list to select value
                ->attach('#fileinput', __DIR__ . '/test.txt')
                ->press('UPLOAD')
                ->assertSee('File uploaded successfully.');
        });
    }

    public function testDocView()
    {
        $this->seed('DatabaseSeeder');
        $this->browse(function ($first) {
            $first->loginAs(User::find(1))
                ->visit('/document/add')
                ->value('#documentName', 'viewTest')
                ->value('#documentVersion', '1')
                ->value('#category', 'Payroll')//Doesn't use dropdown list to select value
                ->attach('#fileinput', __DIR__ . '/test.txt')
                ->press('UPLOAD')
                ->visit('/home')
                ->assertSee('viewTest');
        });
    }

    public function testDocEdit()
    {
        $this->seed('DatabaseSeeder');
        $this->browse(function ($first) {
            $first->loginAs(User::find(1))
                ->visit('/home')
                ->clickLink('mode_edit')
                ->value('#documentName', 'Name Change Test')
                ->value('#documentVersion', '1.2')
                ->press('UPDATE')
                ->assertSee('File updated successfully.')
                ->assertSee('Name Change Test')
                ->assertSee('v1.2')

                ->loginAs(User::find(2))
                ->visit('/document/edit/1')
                ->AssertSee('You don\'t have permission to edit this document.')
                
                ->loginAs(User::find(3))
                ->visit('/document/edit/1')
                ->assertDontSee('You don\'t have permission to edit this document.');
        });
    }

    public function testDocActive()
    {
        $this->seed('DatabaseSeeder');
        $this->browse(function ($first) {
            $first->loginAs(User::find(2))
                ->visit('/home')
                ->assertSee('NO HR DOCUMENTS.')
                ->assertSee('Test Development Document')
                ->assertSee('NO PAYROLL DOCUMENTS.')
                ->visit('/document/activate/2')
                ->assertSee("You don't have permission to do that.")
                ->loginAs(User::find(1))
                ->visit('/home')
                ->assertDontSee('NO HR DOCUMENTS.')
                ->assertDontSee('NO PAYROLL DOCUMENTS.')
                ->clickLink('done')
                ->assertSee('File Activated.')
                ->clickLink('cancel')
                ->assertSee('File Deactivated.')
                ->visit('/document/activate/1')
                ->visit('/document/activate/2')
                ->loginAs(User::find(2))
                ->visit('/home')
                ->assertDontSee('NO HR DOCUMENTS.')
                ->assertSee('NO DEVELOPMENT DOCUMENTS.')
                
                ->loginAs(User::find(3))
                ->visit('/document/activate/3')
                ->assertDontSee('You don\'t have permission to do that.');;
        });
    }
    
    public function testDocDelete()
    {
        $this->seed('DatabaseSeeder');
        $this->browse(function ($first) {
            $first->loginAs(User::find(1))
                ->visit('/home')
                ->clickLink('done')
                ->assertSee('File Activated.')
                
                ->loginAs(User::find(2))
                ->visit('/home')
                ->assertSee('Test HR Document')
                
                ->loginAs(User::find(1))
                ->visit('/home')
                ->clickLink('delete')
                ->assertSee('File has been deleted.')
                ->assertSee('NO HR DOCUMENTS.')
                
                ->loginAs(User::find(2))
                ->visit('/home')
                ->assertSee('NO HR DOCUMENTS.')
                
                ->visit('/document/delete/2')
                ->assertSee("You don't have permission to do that.")
                
                ->loginAs(User::find(3))
                ->visit('/document/delete/3')
                ->assertDontSee("You don't have permission to do that.");;
        });
    }
}