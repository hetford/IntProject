<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class ArchiveTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    
    use DatabaseMigrations;
    
    public function testArchive()
    {
        $this->seed('DatabaseSeeder');
        $this->browse(function ($first) {
            $first->loginAs(User::find(1))
                ->visit('/document/add')
                ->value('#documentName', 'Test Archive')
                ->value('#documentVersion', '1')
                ->value('#category', 'HR')//Doesn't use dropdown list to select value
                ->attach('#fileinput', __DIR__ . '/test.txt')
                ->press('UPLOAD')
                ->assertSee('File uploaded successfully.')
            
                ->visit('/home')
                ->assertSee('Test Archive')

                ->clickLink('delete')
                ->assertSee('File has been deleted.')
                
                ->visit('/archive')
                ->assertSee("You don't have permission to view this page.")
                
                ->loginAs(User::find(2))
                ->visit('/home')
                ->visit('/archive')
                ->assertSee("You don't have permission to view this page.")
                    
                ->loginAs(User::find(3))
                ->visit('/archive')
                ->assertSee('Test');
        });
    }
}
