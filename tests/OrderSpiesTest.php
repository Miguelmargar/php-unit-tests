<?php

    use PHPUnit\Framework\TestCase;

    class OrderSpiesTest extends TestCase {
        public function tearDown(): void {
            Mockery::close();
        }

        public function testOrderIsProcessedUsingMock() {
            $order = new OrderSpies(3, 1.99);

            $this->assertEquals(5.97, $order->amount);

            $gateway_mock = Mockery::mock('PaymentGateway');

            $gateway_mock->shouldReceive("charge")
                        ->once()
                        ->with(5.97);

            $order->process($gateway_mock);
        }

        public function testOrderIsProcessedUsingASpy() {
            $order = new OrderSpies(3, 1.99);

            $this->assertEquals(5.97, $order->amount);

            $gateway_spy = Mockery::spy("PaymentGateway");

            $order->process($gateway_spy);
            // Use of Spies to test having the expectations after the code
            // using the mock is called not before - unittest does not have spies
            // Spies do not allow to stub a value though - need to use Mock for this
            $gateway_spy->shouldHaveReceived("charge")
                        ->once()
                        ->with(5.97);
        }
    }