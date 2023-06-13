<?php
use PHPUnit\Framework\TestCase;

final class UtilsTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testTrueIsTrue(): void
    {
        $this->assertSame(TRUE, TRUE);
    }
}
