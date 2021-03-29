<?php

    use PHPUnit\Framework\TestCase;

    class WeatherMonitorTest extends TestCase {

        public function tearDown(): void {
            Mockery::close();
        }

        public function testCorrectAverageIsReturned() {
            $service = $this->createMock(TemperatureService::class);

            // use an array of arrays containing the input values with their
            // output values for when we want to call a method a number of times
            // and have different outputs to test
            $map = [
                ['12:00', 20],
                ['14:00', 26]
            ];

            // Call to getTemperature twice and using $map to pass in the input and
            // output values to be expected
            $service->expects($this->exactly(2))
                    ->method('getTemperature')
                    ->will($this->returnValueMap($map));

            $weather = new WeatherMonitor($service);

            $this->assertEquals(23, $weather->getAverageTemperature('12:00', '14:00'));
        }

        public function testCorrectAverageIsReturnedWithMockery() {
            $service = Mockery::mock(TemperatureService::class);

            $service->shouldReceive("getTemperature")->once()->with("12:00")->andReturn(20);
            $service->shouldReceive("getTemperature")->once()->with("14:00")->andReturn(26);

            $weather = new WeatherMonitor($service);

            $this->assertEquals(23, $weather->getAverageTemperature('12:00', '14:00'));
        }
    }