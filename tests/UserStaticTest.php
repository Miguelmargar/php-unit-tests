<?php
    use PHPUnit\Framework\TestCase;

    class UserStaticTest extends TestCase {

        public function tearDown(): void {
            Mockery::close();
        }

        public function testNotifyReturnsTrue() {
            $user = new UserStatic('dave@example.com');

            $mailer = $this->createMock(Mailer::class);

            // This needs to be an anonymous function and can not be
            // the callable [Mailer::class, 'send'] as using this callable
            // will use the static class directly and not the mock below.
            $user->setMailerCallable(function() {

                echo "mocked";

                return true;
            });

            $this->assertTrue($user->notify('Hello'));
        }

        public function testNotifyReturnsTrueWithMockery() {
            $user = new User('dave@example.com');

            $mock = Mockery::mock('alias:Mailer');

            $mock->shouldReceive('send')
                 ->once()
                 ->with($user->email, 'Hello')
                 ->andReturn(true);

            $this->assertTrue($user->notify('Hello!'));
        }
    }