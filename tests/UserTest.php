<?php
    use PHPUnit\Framework\TestCase;

    class UserTest extends TestCase {

        public function testReturnsFullName() {

            $user = new User;
            $user->first_name = "Miguel";
            $user->surname = "Martinez";

            $this->assertEquals("Miguel Martinez", $user->getFullName());
        }

        public function testFullNameIsEmptyByDefault() {
            // No need to require the file again as it is available from
            // test method above and test methods run from top to bottom
            $user = new User;

            $this->assertEquals('', $user->getFullName());
        }

        // Can do the below to not user the word test followed by
        // The description of what the method tests but needs
        // Underscores and the doc block with the below annotation
        /**
        * @test
        */
        public function user_has_first_name() {
            $user = new User;
            $user->first_name = "Miguel";

            $this->assertEquals('Miguel', $user->first_name);
        }

        public function testNotificationIsSent() {
            $user = new User;

            // if you don't want the original Mailer class to run
            // Creates a mock object of that class
            $mock_mailer = $this->createMock(Mailer::class);
            // expects is checking that the method below is used at least once
            // different methods available like never()
            $mock_mailer->expects($this->once())
                        ->method('sendMessage')
                        // To test argument matches - different matching methods available
                        // These methods are in the phpunit source code
                        ->with($this->equalTo("david@example.com"), $this->equalTo("Hello"))
                        // Overrides the value mock Mailer obj returns
                        ->willReturn(true);

            $user->setMailer($mock_mailer);

            $user->email = "david@example.com";

            $this->assertTrue($user->notify("Hello"));
        }

        // Tests
        public function testCannotNotifyUserWithNoEmail() {
            $user = new User;

            // The below forces the mock object to return an exception
            // but if we want to test the real object code and not the mock
            // object the below is not needed
            // $mock_mailer = $this->createMock(Mailer::class);
            // $mock_mailer->method("sendMessage")
                        // ->will($this->throwException(new Exception));

            // Use below if we want to test the real Mailer obj code inside a mock obj
            $mock_mailer = $this->getMockBuilder(Mailer::class)
                                // bellow allows all methods in class to run
                                ->setMethods(null)
                                // below tells what methods to be stubbed and not run
                                // ->setMethods(["sendMessage"])
                                ->getMock();

            $user->setMailer($mock_mailer);

            $this->expectException(Exception::class);

            $user->notify("Hello");
        }
    }