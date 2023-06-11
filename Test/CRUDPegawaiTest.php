<?php

require_once 'includes\Pegawai.class.php';

class CRUDPegawaiTest extends PHPUnit\Framework\TestCase
{
    protected static $pegawai;

    public static function setUpBeforeClass(): void
    {
        self::$pegawai = new Pegawai("localhost", "root", "", "atsi");
        self::$pegawai->open(); // Open the database connection
    }

    public static function tearDownAfterClass(): void
    {
        self::$pegawai->close(); // Close the database connection
    }

    public function testAddPegawai()
    {
        $data = array(
            'nip' => '2000999',
            'nama' => 'John Doe',
            'jabatan' => 'Karyawan',
            'divisi' => 'Sales',
            'no_telp' => '123456789',
            'email' => 'john.doe@example.com',
            'pass' => 'password'
        );

        $result = self::$pegawai->addPegawai($data);

        $this->assertTrue($result);
    }

    public function testUpdatePegawai()
    {
        $data = array(
            'nip' => '2000999',
            'nama' => 'John Doe',
            'jabatan' => 'Manajer',
            'divisi' => 'Pemasaran',
            'no_telp' => '987654321',
            'email' => 'john.doe@example.com',
            'pass' => 'newpassword'
        );

        $result = self::$pegawai->updatePegawai($data);

        $this->assertTrue($result);
    }

    public function testDeletePegawai()
    {
        $nip = '2000999';

        $result = self::$pegawai->deletePegawai($nip);

        $this->assertTrue($result);
    }
}
