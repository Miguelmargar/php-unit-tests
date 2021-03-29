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

            $mock_mailer = $this->createMock(Mailer::class);
            $mock_mailer->method('sendMessage')->willReturn(true);

            $user->setMailer($mock_mailer);

            $user->email = "dave@example.com";

            $this->assertTrue($user->notify("hello"));
        }
    }