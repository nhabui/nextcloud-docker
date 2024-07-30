<?php

declare(strict_types=1);
/**
 * @copyright Copyright (c) 2023 Joas Schilling <coding@schilljs.com>
 * @copyright Copyright (c) 2021 Gary Kim <gary@garykim.dev>
 *
 * @author Gary Kim <gary@garykim.dev>
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

use OCP\AppFramework\Db\Entity;

/**
 * @method void setUserId(string $userId)
 * @method string getUserId()
 * @method void setState(int $state)
 * @method int getState()
 * @method void setLocalRoomId(int $localRoomId)
 * @method int getLocalRoomId()
 * @method void setAccessToken(string $accessToken)
 * @method string getAccessToken()
 * @method void setRemoteServerUrl(string $remoteServerUrl)
 * @method string getRemoteServerUrl()
 * @method void setRemoteToken(string $remoteToken)
 * @method string getRemoteToken()
 * @method void setRemoteAttendeeId(int $remoteAttendeeId)
 * @method int getRemoteAttendeeId()
 * @method void setInviterCloudId(string $inviterCloudId)
 * @method string getInviterCloudId()
 * @method void setInviterDisplayName(string $inviterDisplayName)
 * @method string getInviterDisplayName()
 * @method void setLocalCloudId(string $localCloudId)
 * @method string getLocalCloudId()
 */
class Invitation extends Entity implements \JsonSerializable {
	public const STATE_PENDING = 0;
	public const STATE_ACCEPTED = 1;

	protected string $userId = '';
	protected int $state = self::STATE_PENDING;
	protected int $localRoomId = 0;
	protected string $accessToken = '';
	protected string $remoteServerUrl = '';
	protected string $remoteToken = '';
	protected int $remoteAttendeeId = 0;
	protected string $inviterCloudId = '';
	protected string $inviterDisplayName = '';
	protected string $localCloudId = '';

	public function __construct() {
		$this->addType('userId', 'string');
		$this->addType('state', 'int');
		$this->addType('localRoomId', 'int');
		$this->addType('accessToken', 'string');
		$this->addType('remoteServerUrl', 'string');
		$this->addType('remoteToken', 'string');
		$this->addType('remoteAttendeeId', 'int');
		$this->addType('inviterCloudId', 'string');
		$this->addType('inviterDisplayName', 'string');
		$this->addType('localCloudId', 'string');
	}

	/**
	 * @return array{id: int, localCloudId: string, remoteAttendeeId: int, remoteServerUrl: string, remoteToken: string, state: int, userId: string, inviterCloudId: string, inviterDisplayName: string}
	 */
	public function jsonSerialize(): array {
		return [
			'id' => $this->getId(),
			'userId' => $this->getUserId(),
			'state' => $this->getState(),
			'localCloudId' => $this->getLocalCloudId(),
			'remoteServerUrl' => $this->getRemoteServerUrl(),
			'remoteToken' => $this->getRemoteToken(),
			'remoteAttendeeId' => $this->getRemoteAttendeeId(),
			'inviterCloudId' => $this->getInviterCloudId(),
			'inviterDisplayName' => $this->getInviterDisplayName() ?: $this->getInviterCloudId(),
		];
	}
}
