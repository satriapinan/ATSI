<?php

require_once 'includes/LaporanAbsensi.class.php';

class LaporanAbsensiTest extends PHPUnit\Framework\TestCase
{
    protected static $laporanAbsensi;

    public static function setUpBeforeClass(): void
    {
        self::$laporanAbsensi = new LaporanAbsensi("localhost", "root", "", "atsi");
        self::$laporanAbsensi->open(); // Open the database connection
    }

    public static function tearDownAfterClass(): void
    {
        self::$laporanAbsensi->close(); // Close the database connection
    }

    public function testSetStatusValidasi()
    {
        $id = 4;

        $result = self::$laporanAbsensi->setStatusValidasi($id);

        $this->assertTrue($result);
    }
}
