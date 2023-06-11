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

WebUI.setText(findTestObject('Object Repository/Page_Masuk/input_Selamat Datang_nip'), '2000514')

WebUI.setEncryptedText(findTestObject('Object Repository/Page_Masuk/input_Nomor Induk Pegawai_pass'), 'f5BfzQSpAdQ=')

WebUI.click(findTestObject('Object Repository/Page_Masuk/button_Masuk'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Karyawan/button_Urut'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Karyawan/a_NIP'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Karyawan/button_Urut'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Karyawan/a_Nama'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Karyawan/a_Detail'))

WebUI.click(findTestObject('Object Repository/Page_Data Absensi/button_Status Validasi'))

WebUI.click(findTestObject('Object Repository/Page_Data Absensi/a_Sudah Validasi'))

WebUI.click(findTestObject('Object Repository/Page_Data Absensi/button_Status Validasi'))

WebUI.click(findTestObject('Object Repository/Page_Data Absensi/a_Belum Validasi'))

WebUI.click(findTestObject('Object Repository/Page_Data Absensi/button_Status Validasi'))

WebUI.click(findTestObject('Object Repository/Page_Data Absensi/a_Semua'))

WebUI.click(findTestObject('Object Repository/Page_Data Absensi/a_Validasi'))

WebUI.click(findTestObject('Object Repository/Page_Data Absensi/a_Manajer_menu-button'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Karyawan/a_Detail'))

WebUI.click(findTestObject('Object Repository/Page_Data Absensi/i_Manajer_fa fa-address-book-o fs-3'))

WebUI.click(findTestObject('Object Repository/Page_Daftar Karyawan/a_Manajer_logout-button'))

