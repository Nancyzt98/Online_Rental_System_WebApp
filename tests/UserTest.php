<?php

    class UserTest extends \PHPUnit\Framework\TestCase{
        public function testEmpty() {
            $value = [];
            $this->assertEmpty($value);
            return $value;
        }

        public function testFullName() {

            $user = new \App\User;

            $user->setFullName('Julie');

            $this->assertEquals($user->getFullName(), 'Julie');
        }

        public function testEmail() {

            $user = new \App\User;

            $user->setEmail('abc@email');

            $this->assertEquals($user->getEmail(), 'abc@email');
        }
    }
?>