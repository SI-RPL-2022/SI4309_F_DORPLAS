<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /** @test */
    public function open_login_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->assertSee('Belum punya akun ? Daftar');
        });
    }

    /** @test */
    public function user_can_login_and_redirect_to_dashboard()
    {
        $user = collect([
            'email_donators' => 'muhammad.rezki.ananda@gmail.com',
            'password_donators' => '12345'
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->assertSee('Masuk')
                ->type('email_donators', $user['email_donators'])
                ->type('password_donators', $user['password_donators'])
                ->press('Masuk')
                ->assertPathIs('/dashboard');
        });
    }

    /** @test */
    public function user_failed_to_login()
    {
        $user = collect([
            'email_donators' => 'muhammad.rezki.ananda@gmail.com',
            'password_donators' => '123454321'
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->assertSee('Masuk')
                ->type('email_donators', $user['email_donators'])
                ->type('password_donators', $user['password_donators'])
                ->press('Masuk')
                ->assertPathIs('/login')
                ->assertSee('Email atau password tidak cocok');
        });
    }

    /** @test */
    public function user_can_logout()
    {
        $user = collect([
            'email_donators' => 'muhammad.rezki.ananda@gmail.com',
            'password_donators' => '12345'
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->assertSee('Masuk')
                ->type('email_donators', $user['email_donators'])
                ->type('password_donators', $user['password_donators'])
                ->press('Masuk')
                ->assertPathIs('/dashboard')
                ->ClickLink('Keluar')
                ->whenAvailable('#logoutModal', function ($modal) {
                    $modal->pause(1000)
                        ->assertSee('Anda yakin ingin logout ?')
                        ->press('Keluar');
                });
        });
    }
}
