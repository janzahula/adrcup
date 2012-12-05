<?php

namespace Adrenalincup;

use Nette;



/**
 * Provádí operace nad databázovou tabulkou.
 */
abstract class Base extends Nette\Object
{
	/** @var Nette\Database\Connection */
	protected $connection;



	public function __construct(Nette\Database\Connection $db)
	{
		$this->connection = $db;
	}



	/**
	 * Vrací objekt reprezentující databázovou tabulku.
	 * @return Nette\Database\Table\Selection
	 */
	



	/**
	 * Vrací všechny řádky z tabulky.
	 * @return Nette\Database\Table\Selection
	 */
	public function findAll()
	{
		return $this->getTable();
	}



	/**
	 * Vrací řádky podle filtru, např. array('name' => 'John').
	 * @return Nette\Database\Table\Selection
	 */
	public function findBy(array $by)
	{
		return $this->getTable()->where($by);
	}

}
