<?php

namespace V\Scheduler3\Task;

use TYPO3\CMS\Core\Utility\GeneralUtility;

class SampleTask extends \TYPO3\CMS\Scheduler\Task\AbstractTask {

	public function execute() {

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

		return TRUE;
	}

	function getDefaultFlashMessageQueue() {
		/** @var $flashMessageService \TYPO3\CMS\Core\Messaging\FlashMessageService */
		$flashMessageService = GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Messaging\\FlashMessageService');
		/** @var $defaultFlashMessageQueue \TYPO3\CMS\Core\Messaging\FlashMessageQueue */
		return $flashMessageService->getMessageQueueByIdentifier();

	}
}