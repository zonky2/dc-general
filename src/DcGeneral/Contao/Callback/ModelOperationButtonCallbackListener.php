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

namespace DcGeneral\Contao\Callback;

use DcGeneral\Contao\View\Contao2BackendView\Event\GetOperationButtonEvent;

/**
 * Class ModelOperationButtonCallbackListener.
 *
 * Handle the button_callbacks.
 *
 * @package DcGeneral\Contao\Callback
 */
class ModelOperationButtonCallbackListener extends AbstractReturningCallbackListener
{
	/**
	 * Retrieve the arguments for the callback.
	 *
	 * @param GetOperationButtonEvent $event The event being emitted.
	 *
	 * @return array
	 */
	public function getArgs($event)
	{
		$attributes = $event->getAttributes();

		return array(
			$event->getModel(),
			$event->getHref(),
			$event->getLabel(),
			$event->getTitle(),
			isset($attributes['icon']) ? $attributes['icon'] : null,
			$event->getAttributes(),
			$event->getEnvironment()->getDataDefinition()->getName(),
			$event->getEnvironment()->getRootIds(),
			$event->getChildRecordIds(),
			$event->getCircularReference(),
			$event->getPrevious()->getId(),
			$event->getNext()->getId()
		);
	}

	/**
	 * Set the value in the event.
	 *
	 * @param GetOperationButtonEvent $event The event being emitted.
	 *
	 * @param string                  $value The value returned by the callback.
	 *
	 * @return void
	 */
	public function update($event, $value)
	{
		if (is_null($value))
		{
			return;
		}

		$event->setHtml($value);
		$event->stopPropagation();
	}
}