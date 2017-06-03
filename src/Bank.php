<?php

class Bank
{
	protected $balance;	
	protected $account;
	public function __construct($name, $balance = 0) 
	{
		$this->account = $name;
		$this->balance = $balance;
	}

	public function deposit($v) 
	{
		if (is_int($v) && $v > 0) {
			$this->balance += $v;
			return $this->balance;
		} else {
			throw new Exception('invalid amount of money');
		}
	}

	public function withdraw($v) 
   	{
		if (is_int($v) && $v > 0) {
			if ($this->balance >= $v) {
				$this->balance -= $v;
				return $v;
			} else {
				throw new Exception('You have no enough balance');
			}
		} else {
			throw new Exception('invalid amount of money');
		}
	}

}
