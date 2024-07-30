<?php

declare(strict_types=1);

/**
 * @copyright Copyright (c) 2024 Joas Schilling <coding@schilljs.com>
 *
 * @author Joas Schilling <coding@schilljs.com>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCA\Talk\Model;

use OCA\Talk\ResponseDefinitions;
use OCP\AppFramework\Db\Entity;

/**
 * @method void setLocalToken(string $localToken)
 * @method string getLocalToken()
 * @method void setRemoteServerUrl(string $remoteServerUrl)
 * @method string getRemoteServerUrl()
 * @method void setRemoteToken(string $remoteToken)
 * @method string getRemoteToken()
 * @method void setRemoteMessageId(int $remoteMessageId)
 * @method int getRemoteMessageId()
 * @method void setActorType(string $actorType)
 * @method string getActorType()
 * @method void setActorId(string $actorId)
 * @method string getActorId()
 * @method void setActorDisplayName(?string $actorDisplayName)
 * @method string|null getActorDisplayName()
 * @method void setMessageType(string $messageType)
 * @method string getMessageType()
 * @method void setSystemMessage(?string $systemMessage)
 * @method string|null getSystemMessage()
 * @method void setExpirationDatetime(?\DateTime $expirationDatetime)
 * @method \DateTime|null getExpirationDatetime()
 * @method void setMessage(?string $message)
 * @method string|null getMessage()
 * @method void setMessageParameters(?string $messageParameters)
 * @method string|null getMessageParameters()
 * @method void setCreationDatetime(?\DateTime $creationDatetime)
 * @method \DateTime|null getCreationDatetime()
 * @method void setMetaData(?string $metaData)
 * @method string|null getMetaData()
 *
 * @psalm-import-type TalkChatProxyMessage from ResponseDefinitions
 */
class ProxyCacheMessage extends Entity implements \JsonSerializable {
	public const METADATA_REPLY_TO_ACTOR_TYPE = 'replyToActorType';
	public const METADATA_REPLY_TO_ACTOR_ID = 'replyToActorId';
	public const METADATA_REPLY_TO_MESSAGE_ID = 'replyToMessageId';


	protected string $localToken = '';
	protected string $remoteServerUrl = '';
	protected string $remoteToken = '';
	protected int $remoteMessageId = 0;
	protected string $actorType = '';
	protected string $actorId = '';
	protected ?string $actorDisplayName = null;
	protected ?string $messageType = null;
	protected ?string $systemMessage = null;
	protected ?\DateTime $expirationDatetime = null;
	protected ?string $message = null;
	protected ?string $messageParameters = null;
	protected ?\DateTime $creationDatetime = null;
	protected ?string $metaData = null;

	public function __construct() {
		$this->addType('localToken', 'string');
		$this->addType('remoteServerUrl', 'string');
		$this->addType('remoteToken', 'string');
		$this->addType('remoteMessageId', 'int');
		$this->addType('actorType', 'string');
		$this->addType('actorId', 'string');
		$this->addType('actorDisplayName', 'string');
		$this->addType('messageType', 'string');
		$this->addType('systemMessage', 'string');
		$this->addType('expirationDatetime', 'datetime');
		$this->addType('message', 'string');
		$this->addType('messageParameters', 'string');
		$this->addType('creationDatetime', 'datetime');
		$this->addType('metaData', 'string');
	}

	public function getParsedMessageParameters(): array {
		return json_decode($this->getMessageParameters() ?? '[]', true);
	}

	public function getParsedMetaData(): array {
		return json_decode($this->getMetaData() ?? '[]', true);
	}

	/**
	 * @return TalkChatProxyMessage
	 */
	public function jsonSerialize(): array {
		$expirationTimestamp = 0;
		if ($this->getExpirationDatetime()) {
			$expirationTimestamp = $this->getExpirationDatetime()->getTimestamp();
		}

		return [
			'actorType' => $this->getActorType(),
			'actorId' => $this->getActorId(),
			'actorDisplayName' => $this->getActorDisplayName() ?? '',
			'timestamp' => $this->getCreationDatetime()->getTimestamp(),
			'expirationTimestamp' => $expirationTimestamp,
			'messageType' => $this->getMessageType(),
			'systemMessage' => $this->getSystemMessage() ?? '',
			'message' => $this->getMessage() ?? '',
			'messageParameters' => $this->getParsedMessageParameters(),
		];
	}
}
