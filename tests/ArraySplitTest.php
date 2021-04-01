<?php
  use PHPUnit\Framework\TestCase;

  class ArraySplitTest extends TestCase {

    protected $arraySplit;

    public function setUp(): void {
      $this->arraySplit = new ArraySplit;
    }

    public function testArrayIsReturned() {
      $this->assertEquals([], $this->arraySplit->split([[], 0]));
    }

    public function testCorrectNumOfSubArraysAreReturned() {
      $this->assertEquals([[]], $this->arraySplit->split([[], 1]));
      $this->assertEquals([[], [], [], []], $this->arraySplit->split([[], 4]));
    }

    public function testOneNumberGivenIsSplitIntoArray() {
      $this->assertEquals([[1]], $this->arraySplit->split([[1], 1]));
    }

    public function testEvenNumbersExactSplitGivenAreSplitIntoArrays() {
      $this->assertEquals([[1], [2]], $this->arraySplit->split([[1, 2], 2]));
      $this->assertEquals([[1], [2], [3], [4]], $this->arraySplit->split([[1, 2, 3, 4], 4]));
    }

    public function testUnEvenNumbersExactSplitGivenAreSplitIntoArrays() {
      $this->assertEquals([[1], [2], [3]], $this->arraySplit->split([[1, 2, 3], 3]));
      $this->assertEquals([[1], [2], [3], [4], [5]], $this->arraySplit->split([[1, 2, 3, 4, 5], 5]));
    }

    public function testBothEvenAndUnevenExactSplitWithDifferentArrayNumbers() {
      $this->assertEquals([[5], [3]], $this->arraySplit->split([[5, 3], 2]));
      $this->assertEquals([[4],[6], [18]], $this->arraySplit->split([[4, 6, 18], 3]));
    }

    public function testEvenNumbersUnExactSplitGivenAreSplitIntoArrays() {
      $this->assertEquals([[1, 3], [2]], $this->arraySplit->split([[1, 2, 3], 2]));
      $this->assertEquals([[1, 3], [2, 4]], $this->arraySplit->split([[1, 2, 3, 4], 2]));
      $this->assertEquals([[1, 3, 7], [2, 4]], $this->arraySplit->split([[1, 2, 3, 4, 7], 2]));
    }

    public function testUnEvenNumbersUnExactSplitGivenAreSplitIntoArrays() {
      $this->assertEquals([[1, 4], [2], [3]], $this->arraySplit->split([[1, 2, 3, 4], 3]));
      $this->assertEquals([[1, 21], [5], [3]], $this->arraySplit->split([[1, 5, 3, 21], 3]));
    }

    public function testMoreArraysThanNumbersGiven() {
      $this->assertEquals([[1, 7], [2], [3], [4]], $this->arraySplit->split([[1, 2, 3, 4, 7], 4]));
      $this->assertEquals([[1, 15], [2, 9], [3, 10], [4], [7]], $this->arraySplit->split([[1, 2, 3, 4, 7, 15, 9, 10], 5]));
    }

    public function testArrayWithObjsButZeroNum() {
      $this->assertEquals([1, 5, 9], $this->arraySplit->split([[1, 5, 9], 0]));
    }

  }
