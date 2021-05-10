<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

class SearchTest extends TestCase
{
    use TestCaseTrait;

    /**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection()
    {
        $dbms='mysql';          
        $host='placetolive.chuy0fvfnt0x.us-east-2.rds.amazonaws.com';  
        $dbName='placetolive';         
        $user='onesandohs';           
        $pass='ptl-onesandohs-123';         
        $dsn="$dbms:host=$host;dbname=$dbName";
        $pdo = new PDO($dsn, $user, $pass);
        return $this->createDefaultDBConnection($pdo, $dbName);
    }
    public function getDataSet(){
        $tableNames = ['property_info'];
        return $this -> getConnection() -> createDataSet($tableNames);
    }


    public function testSearch_correct()
    {
        $queryTable = $this ->getConnection() -> createQueryTable
        ('property_info','select * from property_info where City = "Duluth"');
        $expectedTable = $this ->getConnection() -> createQueryTable
        ('property_info','select * from property_info where City = "Duluth"');
        $this->assertTablesEqual($expectedTable, $queryTable);
    }
    public function testSearch_fail()
    {
        $queryTable = $this ->getConnection() -> createQueryTable
        ('property_info','select * from property_info where Zip_Code = 30000');
        $expectedTable = $this ->getConnection() -> createQueryTable
        ('property_info','select * from property_info where Zip_Code = 30096');
        $this->assertTablesEqual($expectedTable, $queryTable);
    }
    public function testSearch_fail_strangesymbol()
    {
        $queryTable = $this ->getConnection() -> createQueryTable
        ('property_info','select * from property_info where City = "&^*((&"');
        $expectedTable = $this ->getConnection() -> createQueryTable
        ('property_info','select * from property_info where City = "Duluth"');
        $this->assertTablesEqual($expectedTable, $queryTable);
    }
}
?>
