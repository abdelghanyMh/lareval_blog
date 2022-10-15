<?php

namespace Tests\Feature;

use Tests\TestCase;

class AboutPageTest extends TestCase
{
    public function test_the_about_page_request()
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
    }

    public function test_the_about_view_is_rendered()
    {
        // withViewErrors provides an empty $errors bag
        $view = $this->withViewErrors([])->view('about');

        $view->assertSee('This is the about page');
    }
}
