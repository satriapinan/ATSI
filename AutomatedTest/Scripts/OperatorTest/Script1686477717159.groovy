import static com.kms.katalon.core.checkpoint.CheckpointFactory.findCheckpoint
import static com.kms.katalon.core.testcase.TestCaseFactory.findTestCase
import static com.kms.katalon.core.testdata.TestDataFactory.findTestData
import static com.kms.katalon.core.testobject.ObjectRepository.findTestObject
import static com.kms.katalon.core.testobject.ObjectRepository.findWindowsObject
import com.kms.katalon.core.checkpoint.Checkpoint as Checkpoint
import com.kms.katalon.core.cucumber.keyword.CucumberBuiltinKeywords as CucumberKW
import com.kms.katalon.core.mobile.keyword.MobileBuiltInKeywords as Mobile
import com.kms.katalon.core.model.FailureHandling as FailureHandling
import com.kms.katalon.core.testcase.TestCase as TestCase
import com.kms.katalon.core.testdata.TestData as TestData
import com.kms.katalon.core.testng.keyword.TestNGBuiltinKeywords as TestNGKW
import com.kms.katalon.core.testobject.TestObject as TestObject
import com.kms.katalon.core.webservice.keyword.WSBuiltInKeywords as WS
import com.kms.katalon.core.webui.keyword.WebUiBuiltInKeywords as WebUI
import com.kms.katalon.core.windows.keyword.WindowsBuiltinKeywords as Windows
import internal.GlobalVariable as GlobalVariable
import org.openqa.selenium.Keys as Keys

WebUI.openBrowser('')

WebUI.navigateToUrl('http://localhost/ATSI/index.php')

WebUI.setText(findTestObject('Object Repository/Page_Masuk/input_Selamat Datang_nip (2)'), '2001123')

WebUI.setEncryptedText(findTestObject('Object Repository/Page_Masuk/input_Nomor Induk Pegawai_pass (2)'), 'zcCaY/e+uq0=')

WebUI.sendKeys(findTestObject('Object Repository/Page_Masuk/input_Nomor Induk Pegawai_pass (2)'), Keys.chord(Keys.ENTER))

WebUI.click(findTestObject('Object Repository/Page_Daftar Pegawai/button_Pilih Divisi'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Pegawai/a_Administrasi'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Pegawai/button_Pilih Divisi'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Pegawai/a_Pemasaran'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Pegawai/button_Pilih Divisi'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Pegawai/a_Semua'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Pegawai/button_Urut'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Pegawai/a_NIP'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Pegawai/button_Urut'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Pegawai/a_Nama'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Pegawai/button_Urut'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Pegawai/a_Jabatan'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Pegawai/button_Urut'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Pegawai/a_Divisi'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Pegawai/button_Urut'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Pegawai/a_NIP'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Pegawai/a_Karyawan'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Pegawai/a_Operator'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Pegawai/a_Manajer'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Pegawai/a_Semua_1'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Pegawai/i_Operator_fa fa-user-plus fs-3'))

WebUI.setText(findTestObject('Object Repository/Page_Tambah Pegawai/input_Nomor Induk Pegawai_nip'), '2000999')

WebUI.setText(findTestObject('Object Repository/Page_Tambah Pegawai/input_Nama Lengkap_nama'), 'Testing')

WebUI.setText(findTestObject('Object Repository/Page_Tambah Pegawai/input_Jabatan Pegawai_jabatan'), 'Operator')

WebUI.setText(findTestObject('Object Repository/Page_Tambah Pegawai/input_Divisi Pegawai_divisi'), 'Pemasaran')

WebUI.setText(findTestObject('Object Repository/Page_Tambah Pegawai/input_Nomor Telepon_no_telp'), '089999999999')

WebUI.setText(findTestObject('Object Repository/Page_Tambah Pegawai/input_Email_email'), 'Testing@gmail.com')

WebUI.setText(findTestObject('Object Repository/Page_Tambah Pegawai/input_Password_pass'), 'testing')

WebUI.click(findTestObject('Object Repository/Page_Tambah Pegawai/button_Tambah'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Pegawai/i_Pemasaran_fa fa-pencil-square-o text-succ_cd3d11'))

WebUI.setText(findTestObject('Object Repository/Page_Tambah Pegawai/input_Divisi Pegawai_divisi'), 'Administrasi')

WebUI.setText(findTestObject('Object Repository/Page_Tambah Pegawai/input_Password_pass'), 'testing')

WebUI.click(findTestObject('Object Repository/Page_Tambah Pegawai/button_Ubah'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Pegawai/i_Administrasi_fa fa-trash-o text-danger fs-4'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Pegawai/i_Operator_fa fa-arrow-circle-o-left fs-3'))

