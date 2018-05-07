<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSave()
    {
        $user = factory(\App\User::class)->make();

        $this->assertTrue($user->save());
    }

    public function testQuestions()
    {
        $user = factory(\App\User::class)->make();
        $this->assertTrue(is_object($user->questions()->get()));
    }
    public function testAnswers()
    {
        $user = factory(\App\User::class)->make();
        $this->assertTrue(is_object($user->answers()->get()));
    }
    public function testProfile()
    {
        $user = factory(\App\User::class)->make();
        $this->assertTrue(is_object($user->profile()->get()));
    }
    public function testDelete()
    {
        $user = factory(\App\User::class)->make();

        $profile = factory(\App\Profile::class)->make();
        $profile->user()->associate($user);

        $question = factory(\App\Question::class)->make();
        $question->user()->associate($user);


        $answer = factory(\App\Answer::class)->make();
        $answer->user()->associate($user);
        $answer->question()->associate($question);

        $this->assertFalse(is_object($user->delete()));
        $this->assertFalse(is_object($profile->delete()));
        $this->assertFalse(is_object($question->delete()));
        $this->assertFalse(is_object($answer->delete()));

    }
}