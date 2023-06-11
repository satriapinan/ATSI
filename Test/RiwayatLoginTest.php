<?php

require_once 'includes\RiwayatLogin.class.php';

class RiwayatLoginTest extends PHPUnit\Framework\TestCase
{
    protected static $riwayatLogin;

    public static function setUpBeforeClass(): void
    {
        self::$riwayatLogin = new RiwayatLogin("localhost", "root", "", "atsi");
        self::$riwayatLogin->open(); // Open the database connection
    }

    public static function tearDownAfterClass(): void
    {
        self::$riwayatLogin->close(); // Close the database connection
    }

    public function testSetRiwayatLogin()
    {
        $countBefore = count(self::$riwayatLogin->getRiwayatLogin());
        
        $result = self::$riwayatLogin->setRiwayatLogin('2000514', '2023-06-11', '12:34:56');
        $this->assertTrue($result);

        $riwayatLoginData = self::$riwayatLogin->getRiwayatLogin();
        $this->assertCount($countBefore + 1, $riwayatLoginData);
    }
}
