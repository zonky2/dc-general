<?php
/**
 * PHP version 5
 * @package    generalDriver
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @author     Stefan Heimes <stefan_heimes@hotmail.com>
 * @author     Tristan Lins <tristan.lins@bit3.de>
 * @copyright  The MetaModels team.
 * @license    LGPL.
 * @filesource
 */

namespace DcGeneral\Contao\Dca;

use DcGeneral\DataDefinition\DataProviderInformation;

/**
 * Class ContaoDataProviderInformation.
 *
 * This Information holds the details of a Contao data provider definition.
 *
 * @package DcGeneral\Contao\Dca
 */
class ContaoDataProviderInformation extends DataProviderInformation
{
	/**
	 * The table name to use.
	 *
	 * @var string
	 */
	protected $tableName;

	/**
	 * Name of the provider class to use.
	 *
	 * @var string
	 */
	protected $className = 'DcGeneral\Data\DefaultDriver';

	/**
	 * Custom initialization data to be passed to the constructor of the driver class.
	 *
	 * @var mixed
	 */
	protected $initializationData;

	/**
	 * Set the table name of the data provider.
	 *
	 * @param string $tableName The name of the table in the database.
	 *
	 * @return ContaoDataProviderInformation
	 */
	public function setTableName($tableName)
	{
		$this->tableName = $tableName;

		return $this;
	}

	/**
	 * Retrieve the table name of the data provider.
	 *
	 * @return string
	 */
	public function getTableName()
	{
		return $this->tableName;
	}

	/**
	 * Set the data provider class to use, defaults to 'DcGeneral\Data\DefaultDriver'.
	 *
	 * @param string $className The name of the data provider class to use.
	 *
	 * @return ContaoDataProviderInformation
	 */
	public function setClassName($className)
	{
		$this->className = $className;

		return $this;
	}

	/**
	 * Retrieve the data provider class to use.
	 *
	 * @return string
	 */
	public function getClassName()
	{
		return $this->className;
	}

	/**
	 * Set the data to use for initialization of the data provider.
	 *
	 * The nature of this data is subject to the concrete implementation of the driver defined as the class to use.
	 *
	 * @param mixed $initializationData The initialization data the driver class expects.
	 *
	 * @return ContaoDataProviderInformation
	 */
	public function setInitializationData($initializationData)
	{
		$this->initializationData = $initializationData;

		return $this;
	}

	/**
	 * Retrieve the data to use for initialization of the data provider.
	 *
	 * @return mixed
	 */
	public function getInitializationData()
	{
		return $this->initializationData;
	}
}
