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

namespace DcGeneral;

use DcGeneral\View\ViewInterface;
use DcGeneral\Data\ModelInterface;

interface EnvironmentInterface
{
	/**
	 * Set the Controller for the current setup.
	 *
	 * @param \DcGeneral\Controller\ControllerInterface $objController The controller to use.
	 *
	 * @return EnvironmentInterface
	 */
	public function setController($objController);

	/**
	 * Retrieve the Controller from the current setup.
	 *
	 * @return \DcGeneral\Controller\ControllerInterface
	 */
	public function getController();

	/**
	 * Set the View for the current setup.
	 *
	 * @param \DcGeneral\View\ViewInterface $objView The view to use.
	 *
	 * @return EnvironmentInterface
	 */
	public function setView($objView);

	/**
	 * Retrieve the Controller from the current setup.
	 *
	 * @return \DcGeneral\View\ViewInterface
	 */
	public function getView();

	/**
	 * Retrieve the data definition
	 *
	 * @param \DcGeneral\DataDefinition\ContainerInterface $objContainer
	 *
	 * @return EnvironmentInterface
	 */
	public function setDataDefinition($objContainer);

	/**
	 * @return \DcGeneral\DataDefinition\ContainerInterface
	 */
	public function getDataDefinition();

	/**
	 * Retrieve the data definition of the parent table.
	 *
	 * @param \DcGeneral\DataDefinition\ContainerInterface $objContainer
	 *
	 * @return EnvironmentInterface
	 */
	public function setParentDataDefinition($objContainer);

	/**
	 * @return \DcGeneral\DataDefinition\ContainerInterface
	 */
	public function getParentDataDefinition();

	/**
	 * @param \DcGeneral\InputProviderInterface $objInputProvider
	 *
	 * @return EnvironmentInterface
	 */
	public function setInputProvider($objInputProvider);

	/**
	 * @return \DcGeneral\InputProviderInterface
	 */
	public function getInputProvider();

	/**
	 *
	 * @param \DcGeneral\Callbacks\CallbacksInterface $objCallbackHandler
	 *
	 * @return EnvironmentInterface
	 *
	 * @deprecated Callback handlers are deprecated, use the Events instead.
	 */
	public function setCallbackHandler($objCallbackHandler);

	/**
	 *
	 * @return \DcGeneral\Callbacks\CallbacksInterface
	 *
	 * @deprecated Callback handlers are deprecated, use the Events instead.
	 */
	public function getCallbackHandler();

	/**
	 * Retrieve the data driver for the named source.
	 *
	 * If a source name is given, the named driver will get returned, if not given, the default driver will get
	 * returned, The default is to be determined via: getEnvironment()->getDataDefinition()->getName()
	 *
	 * @param string|null $strSource The name of the source.
	 *
	 * @return \DcGeneral\Data\DriverInterface
	 */
	public function getDataDriver($strSource = null);

	/**
	 * Register a data driver to the environment.
	 *
	 * @param string                          $strSource The name of the source.
	 *
	 * @param \DcGeneral\Data\DriverInterface $objDriver The driver instance to register under the given name.
	 *
	 * @return EnvironmentInterface
	 */
	public function addDataDriver($strSource, $objDriver);

	/**
	 * Remove a data driver from the environment.
	 *
	 * @param string $strSource The name of the source.
	 *
	 * @return mixed
	 */
	public function removeDataDriver($strSource);

	/**
	 * @param \DcGeneral\Panel\PanelContainerInterface $objPanelContainer
	 *
	 * @return EnvironmentInterface
	 */
	public function setPanelContainer($objPanelContainer);

	/**
	 * @return \DcGeneral\Panel\PanelContainerInterface
	 */
	public function getPanelContainer();

	/**
	 *
	 * @param \DcGeneral\Data\CollectionInterface $objCurrentCollection
	 *
	 * @return EnvironmentInterface
	 */
	public function setCurrentCollection($objCurrentCollection);

	/**
	 *
	 * @return \DcGeneral\Data\CollectionInterface
	 */
	public function getCurrentCollection();

	/**
	 *
	 * @param \DcGeneral\Data\ModelInterface $objCurrentModel
	 *
	 * @return EnvironmentInterface
	 */
	public function setCurrentModel($objCurrentModel);

	/**
	 *
	 * @return \DcGeneral\Data\ModelInterface
	 */
	public function getCurrentModel();

	/**
	 *
	 * @param \DcGeneral\Data\CollectionInterface $objCurrentParentCollection
	 *
	 * @return EnvironmentInterface
	 */
	public function setCurrentParentCollection($objCurrentParentCollection);

	/**
	 *
	 * @return \DcGeneral\Data\CollectionInterface
	 */
	public function getCurrentParentCollection();

	/**
	 * Set the current root ids.
	 *
	 * @param array $arrRootIds The root ids for this data container.
	 *
	 * @return EnvironmentInterface
	 */
	public function setRootIds($arrRootIds);

	/**
	 * Retrieve the current root ids.
	 *
	 * @return array
	 */
	public function getRootIds();

	/**
	 * Return the clipboard.
	 *
	 * @return \DcGeneral\Clipboard\ClipboardInterface
	 */
	public function getClipboard();

	/**
	 * Set the the clipboard.
	 *
	 * @param \DcGeneral\Clipboard\ClipboardInterface $objClipboard Clipboard instance.
	 *
	 * @return EnvironmentInterface
	 */
	public function setClipboard($objClipboard);

	/**
	 * @param \DcGeneral\TranslationManagerInterface $manager
	 *
	 * @return \DcGeneral\EnvironmentInterface
	 */
	public function setTranslationManager($manager);

	/**
	 * @return \DcGeneral\TranslationManagerInterface
	 */
	public function getTranslationManager();
}