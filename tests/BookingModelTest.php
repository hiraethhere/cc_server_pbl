<?php

use PHPUnit\Framework\TestCase;

class BookingModelTest extends TestCase
{
    private $dbMock;
    private $bookingModel;

    protected function setUp(): void
    {
        // 1. Buat Mock untuk class Database
        // Pastikan Anda menunjuk namespace/path class Database Anda dengan benar
        $this->dbMock = $this->createMock(Database::class);

        // 2. Masukkan mock Database ke dalam BookingModel
        $this->bookingModel = new BookingModel($this->dbMock);
    }

    public function testGetActiveBookingByUserReturnsData()
    {
        // Siapkan data palsu yang seolah-olah dikembalikan oleh database
        $fakeResult = [
            'id_booking' => 1,
            'start_time' => '2026-03-12 10:00:00'
        ];

        // Atur ekspektasi pada mock Database: 
        // Saat fungsi 'singleSet' dipanggil, kembalikan $fakeResult
        $this->dbMock->method('singleSet')->willReturn($fakeResult);

        // Eksekusi metode di BookingModel
        $result = $this->bookingModel->getActiveBookingByUser(123);

        // Lakukan assertion (Validasi)
        $this->assertIsArray($result);
        $this->assertEquals(1, $result['id_booking']);
        $this->assertEquals('2026-03-12 10:00:00', $result['start_time']);
    }

    public function testCountBookingPending()
    {
        // Siapkan mock balikan dari fungsi db->singleSet()
        $this->dbMock->method('singleSet')->willReturn(['total' => 5]);

        // Uji fungsi countBookingPending yang memanggil 'SELECT COUNT(*) ...'
        $result = $this->bookingModel->countBookingPending();

        $this->assertEquals(5, $result);
    }
}