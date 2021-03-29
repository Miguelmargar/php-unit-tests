<?php
    use PHPUnit\Framework\TestCase;

    class MockTest extends TestCase {

        public function testMock() {

            $mailer = new Mailer;

            // Here the mock object fakes being the Mailer class and
            // contains all the methods from the mailer class but they
            // just return null by default and don't do anything.
            $mock = $this->createMock(Mailer::class);
            // Below ensures method sendMessage return true by default not none;
            $mock->method('sendMessage')->willReturn(true);

            $result = $mock->sendMessage("dave@example.com", "Hello");

            $this->assertTrue($result);
        }

    }