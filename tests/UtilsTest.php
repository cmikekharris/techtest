<?php
use PHPUnit\Framework\TestCase;
use Techtest\Utils;
use Techtest\Record;

final class UtilsTest extends TestCase
{
    /**
     * @covers Techtest\Utils
     */
    public function testCanGetShortRecord(): void
    {
        $testData = [0 => 'Mr', 1 => 'Mrs Doe'];
        
        $expectedResult = new Record(
            [
                'title' => 'Mr',
                'first_name' => '',
                'initial' => '',
                'last_name' => 'Doe'
            ]
        );

        $result = Utils::getShortRecord($testData);

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * @covers Techtest\Utils
     */
    public function testCanGetRecord(): void
    {
        $testData = 'Mr John William Doe';
        
        $expectedResult = new Record(
            [
                'title' => 'Mr',
                'first_name' => 'John',
                'initial' => '',
                'last_name' => 'Doe'
            ]
        );

        $result = Utils::getRecord($testData);

        $this->assertEquals($expectedResult, $result);
    }
}
