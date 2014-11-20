<?php

namespace V\Scheduler3\Task;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\ArrayUtility;

class SampleTask extends \TYPO3\CMS\Scheduler\Task\AbstractTask {

	public function execute() {

		// Example of flash messages.
		$flashMessageOk = GeneralUtility::makeInstance(
				'\\TYPO3\\CMS\\Core\\Messaging\\FlashMessage',
				'Message to be passed',
				'OK Example',
				\TYPO3\CMS\Core\Messaging\FlashMessage::OK);

		$flashMessageInfo = GeneralUtility::makeInstance(
				'\\TYPO3\\CMS\\Core\\Messaging\\FlashMessage',
				'Message to be passed',
				'Info example',
				\TYPO3\CMS\Core\Messaging\FlashMessage::INFO);


		$flashMessageError = GeneralUtility::makeInstance(
				'\\TYPO3\\CMS\\Core\\Messaging\\FlashMessage',
				'Message to be passed',
				'Error example',
				\TYPO3\CMS\Core\Messaging\FlashMessage::ERROR);

		$defaultFlashMessageQueue = $this->getDefaultFlashMessageQueue();
		$defaultFlashMessageQueue->enqueue($flashMessageOk);
		$defaultFlashMessageQueue->enqueue($flashMessageInfo);
		$defaultFlashMessageQueue->enqueue($flashMessageError);

		// Example of logging debug into table for later.
		GeneralUtility::devLog('[V\\Scheduler3\\Task\\SampleTask]: Message', 'scheduler3', 2, ArrayUtility::convertObjectToArray($this));

		// Example of debug at once into BE.
		debug(ArrayUtility::convertObjectToArray($this));
		return TRUE;
	}

	function getDefaultFlashMessageQueue() {
		/** @var $flashMessageService \TYPO3\CMS\Core\Messaging\FlashMessageService */
		$flashMessageService = GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Messaging\\FlashMessageService');
		/** @var $defaultFlashMessageQueue \TYPO3\CMS\Core\Messaging\FlashMessageQueue */
		return $flashMessageService->getMessageQueueByIdentifier();

	}
}