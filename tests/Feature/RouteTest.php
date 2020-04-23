<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Post;
use Tests\TestCase;

class RouteTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function view_content_text_in_a_home_page(){
        $this->withoutExceptionHandling();
        $post= $this->post('/insert',[
            'title'=>'title post',
            'userid'=> 1
        ]);
        $post->assertOk();
        $this->assertCount(1,\App\Post::all());

    }

    /** @test */
    public function validation_input_a_title(){
       // $this->withoutExceptionHandling();
        $post= $this->post('/insert',[
            'title'=>'',
            'userid'=> 1
        ]);
        $post->assertSessionHasErrors('title');



    }

    /** @test */
    public function validation_input_a_userid(){
     //   $this->withoutExceptionHandling();
        $post= $this->post('/insert',[
            'title'=>'sfsfsdf',
            'userid'=> ''
        ]);
        $post->assertSessionHasErrors('userid');
    }

     /** @test */
     public function update_input(){
        //  $this->withoutExceptionHandling();
         $this->post('/insert',[
             'title'=>'sfsfsdf',
             'userid'=> 1
         ]);

           $post = Post::first();
           $this->patch('/insert/'. $post->id, [
               'title'=>'akram',
               'userid'=>15
           ]);

           $this->assertEquals('akram', Post::first()->title);
           $this->assertEquals(15, Post::first()->userid);




       }



}
