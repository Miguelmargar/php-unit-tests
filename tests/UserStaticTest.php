<?php
    use PHPUnit\Framework\TestCase;

    class UserStaticTest extends TestCase {

        public function testNotifyReturnsTrue() {
            $user = new UserStatic('dave@example.com');

            $mailer = $this->createMock(Mailer::class);

            $user->setMailerCallable(function() {

                echo "mocked";

                return true;
            });

            $this->assertTrue($user->notify('Hello'));
        }
    }