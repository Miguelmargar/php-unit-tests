<?php
    use PHPUnit\Framework\TestCase;

    class OrderTest extends TestCase {

        // If Mockery is not extended from the base class as like in
        // in ExampleTest.php it needs the below method to work
        public function tearDown(): void {
            Mockery::close();
        }

        public function testOrderIsProcessed() {
            // Mock obj creation using phpunit
            $gateway = $this->getMockBuilder("PaymentGateway"::class)
                            ->setMethods(["charge"])
                            ->getMock();
            // Mock obj method creating using phpunit
            $gateway->expects($this->once())
                    ->method("charge")
                    ->with($this->equalTo(200))
                    ->willReturn(true);

            $order = new Order($gateway);
            $order->amount = 200;

            $this->assertTrue($order->process());
        }

        // Same as testOrderIsProcessed but using Mockery instead
        public function testOrderIsProcessedUsingMockery() {
            // Mock PaymentGateway class
            $gateway = Mockery::mock("PaymentGateway");

            // Mock PaymentGateway class method
            $gateway->shouldReceive("charge")
                    ->once()
                    ->with(200)
                    ->andReturn(true);

            $order = new Order($gateway);
            $order->amount = 200;

            $this->assertTrue($order->process());
        }
    }