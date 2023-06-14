<?php
use PHPUnit\Framework\TestCase;
use Techtest\Record;

final class RecordTest extends TestCase
{
    /**
     * @covers Techtest\Record
     */
    public function testCanInstantiateARecord(): void
    {
        $record = new Record([
            'title' => 'Mr',
            'first_name' => 'Joe',
            'initial' => 'A',
            'last_name' => 'Bloggs'
        ]);

        $this->assertIsObject($record);
    }

    /**
     * @covers Techtest\Record
     */
    public function testCanOutputRecordAsArray()
    {
        $compareValue = [
            'title' => 'Mr',
            'first_name' => 'Joe',
            'initial' => 'A',
            'last_name' => 'Bloggs'
        ];

        $record = new Record([
            'title' => 'Mr',
            'first_name' => 'Joe',
            'initial' => 'A',
            'last_name' => 'Bloggs'
        ]);

        $this->assertEquals($record->outputToArray(), $compareValue);
    }
}
