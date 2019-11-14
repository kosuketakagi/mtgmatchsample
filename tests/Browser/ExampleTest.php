<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
//            $browser->visit('/login/twitter')
//                ->type('session[username_or_email]', 'MatchMtg')
//                ->type('session[password]', 'boc0805k')
//                ->click('#allow')
//                ->assertPathIs('/login/twitter/callback')
//                ->pause(5000)
            $browser->loginAs(User::find(1))
                ->visit('/home')
                ->press('募集してみる！')
                ->assertSee('新規募集ページ');

        });
    }

//    public function testBasic()
//    {
////        $user = factory(User::class)->create([
////            'email' => 'MatchMtg',
////        ]);
//
//        $this->browse(function ($browser)  {
//            $browser->visit('/login')
//                ->waitForText('twitterでログイン')
//                ->click('twitterでログイン')
//                ->type('session[username_or_email]', 'MatchMtg')
//                ->type('password', 'boc0805k')
//                ->press('Sign In')
//                ->assertPathIs('/home');
//        });
//    }
}
