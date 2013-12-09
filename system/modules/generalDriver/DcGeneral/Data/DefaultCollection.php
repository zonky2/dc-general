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

namespace DcGeneral\Data;

use DcGeneral\Exception\DcGeneralException;
use DcGeneral\Exception\DcGeneralRuntimeException;

/**
 * Class DefaultCollection.
 *
 * This is the default implementation of a model collection in DcGeneral.
 * Internally it simply holds an array.
 *
 * @package DcGeneral\Data
 */
class DefaultCollection implements CollectionInterface
{
	/**
	 * The list of contained models.
	 *
	 * @var ModelInterface[]
	 */
	protected $arrCollection = array();

	/**
	 * Get length of this collection.
	 *
	 * @return int
	 */
	public function length()
	{
		return count($this->arrCollection);
	}

	/**
	 * Get the model at a specific index.
	 *
	 * @param int $intIndex The index of the model to retrieve.
	 *
	 * @return ModelInterface
	 */
	public function get($intIndex)
	{
		if (array_key_exists($intIndex, $this->arrCollection))
		{
			return $this->arrCollection[$intIndex];
		}

		return null;
	}

	/**
	 * Alias for push - Append a model to the end of this collection.
	 *
	 * @param ModelInterface $objModel The model to append to the collection.
	 *
	 * @return void
	 *
	 * @throws DcGeneralRuntimeException When no model has been passed.
	 *
	 * @deprecated Use push.
	 */
	public function add(ModelInterface $objModel)
	{
		$this->push($objModel);
	}

	/**
	 * Append a model to the end of this collection.
	 *
	 * @param ModelInterface $objModel The model to append to the collection.
	 *
	 * @return void
	 *
	 * @throws DcGeneralRuntimeException When no model has been passed.
	 */
	public function push(ModelInterface $objModel)
	{
		if (!$objModel)
		{
			throw new DcGeneralRuntimeException('push() - no model passed', 1);
		}

		if ($objModel->hasProperties())
		{
			array_push($this->arrCollection, $objModel);
		}
	}

	/**
	 * Remove the model at the end of the collection and return it.
	 *
	 * If the collection is empty, null will be returned.
	 *
	 * @return ModelInterface
	 */
	public function pop()
	{
		if (count($this->arrCollection) != 0)
		{
			return array_pop($this->arrCollection);
		}

		return null;
	}

	/**
	 * Insert a model at the beginning of the collection.
	 *
	 * @param ModelInterface $objModel The model to insert into the collection.
	 *
	 * @return void
	 */
	public function unshift(ModelInterface $objModel)
	{
		if ($objModel->hasProperties())
		{
			array_unshift($this->arrCollection, $objModel);
		}
	}

	/**
	 * Remove the model from the beginning of the collection and return it.
	 *
	 * If the collection is empty, null will be returned.
	 *
	 * @return ModelInterface
	 */
	public function shift()
	{
		if (count($this->arrCollection) != 0)
		{
			return array_shift($this->arrCollection);
		}

		return null;
	}

	/**
	 * Insert a record at the specific position.
	 *
	 * Move all records at position >= $index one index up.
	 * If $index is out of bounds, just add at the end (does not fill with empty records!).
	 *
	 * @param int            $intIndex The index where the model shall be placed.
	 *
	 * @param ModelInterface $objModel The model to insert.
	 *
	 * @return void
	 */
	public function insert($intIndex, ModelInterface $objModel)
	{
		if ($objModel->hasProperties())
		{
			array_insert($this->arrCollection, $intIndex, array($objModel));
		}
	}

	/**
	 * Remove the given index or model from the collection and renew the index.
	 *
	 * ATTENTION: Don't use key to unset in foreach because of the new index.
	 *
	 * @param mixed $mixedValue The index (integer) or InterfaceGeneralModel instance to remove.
	 *
	 * @return void
	 */
	public function remove($mixedValue)
	{
		if (is_object($mixedValue))
		{
			foreach ($this->arrCollection as $intIndex => $objModel)
			{
				if ($mixedValue === $objModel)
				{
					unset($this->arrCollection[$intIndex]);
				}
			}
		}
		else
		{
			unset($this->arrCollection[$mixedValue]);
		}

		$this->arrCollection = array_values($this->arrCollection);
	}

	/**
	 * Make a reverse sorted collection of this collection.
	 *
	 * @return CollectionInterface
	 */
	public function reverse()
	{
		$newCollection = clone $this;
		$newCollection->arrCollection = array_reverse($this->arrCollection);

		return $newCollection;
	}

	/**
	 * Sort the records with the given callback and return the new sorted collection.
	 *
	 * @param callback $callback
	 *
	 * @return CollectionInterface
	 */
	public function sort($callback)
	{
		$newCollection = clone $this;
		uasort($newCollection->arrCollection, $callback);

		$newCollection->arrCollection = array_values($newCollection->arrCollection);

		return $newCollection;
	}

	/**
	 * Get a iterator for this collection.
	 *
	 * @return \IteratorAggregate
	 */
	public function getIterator()
	{
		return new \ArrayIterator($this->arrCollection);
	}
}
