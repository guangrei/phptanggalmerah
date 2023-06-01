<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
final class TanggalMerahTest extends TestCase
{
    private $pt;
    public static function setUpBeforeClass(): void
    {
        self::pt = new \Grei\TanggalMerah();
    }
    public static function tearDownAfterClass(): void
    {
        self::pt = null;
    }
    public function test_check()
    {
        $this->assertFalse($this->pt->check());
    }
    public function test_check2()
    {
        $this->pt->set_date("20190205");
        $this->assertTrue($this->pt->check());
    }
}       