<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $data = [
            'title' => 'MyArticle',
            'content' => 'Bla Bla bla, this is my text, i am not a writer, it is just test text'
        ];

        $this->put('/article', $data)->seeJsonEquals(['created' => true]);


    }
}
