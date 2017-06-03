<?php

require dirname(__DIR__) . '/src/Bank.php';

class BankTest extends PHPUnit_Framework_TestCase
{
	public function testSetBankConstruct() 
	{
		$b = new Bank('jack', 1000);
		$this->assertAttributeEquals('jack', 'account', $b);
		$this->assertAttributeEquals(1000, 'balance', $b);
	}
	
	/**
	 * @expectedException Exception
	 */
	public function testInvalidDeposit() 
	{
		$b = new Bank('jack', 1000);
		$b->deposit("show me the money!");
	}

	public function testValidDeposit() 
	{
		$b = new Bank('jack', 1000);
		$this->assertEquals(2000, $b->deposit(1000));
	}

	/**
	 * @expectedException Exception
	 */
	public function testInvalidArgumentWithdraw() {
		$b = new Bank('jack');
		$b->withDraw("show me a lot of money!");
	}

	/**
	 * @expectedException Exception
	 */
	public function testInvalidWithdraw() 
	{
		$b = new Bank('jack', 1000);
		$b->withDraw(1001);
	}	

	public function testValidWithdraw() 
	{
		$b = new Bank('jack', 1000);
		$this->assertEquals(500, $b->withDraw(500));
	}
}

