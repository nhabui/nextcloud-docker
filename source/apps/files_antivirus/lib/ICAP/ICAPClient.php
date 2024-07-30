<?php

declare(strict_types=1);
/**
 * @copyright Copyright (c) 2022 Robin Appelman <robin@icewind.nl>
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

namespace OCA\Files_Antivirus\ICAP;

use RuntimeException;

class ICAPClient {
	public const MODE_REQ_MOD = 'reqmod';
	public const MODE_RESP_MOD = 'respmod';

	/** @var string */
	protected $host;
	/** @var int */
	protected $port;
	/** @var int */
	protected $connectTimeout;
	/**
	 * @var (callable(string): void)|null
	 */
	private $debugCallback = null;

	public function __construct(string $host, int $port, int $connectTimeout) {
		$this->host = $host;
		$this->port = $port;
		$this->connectTimeout = $connectTimeout;
	}

	/**
	 * @param callable(string): void $callback
	 * @return void
	 */
	public function setDebugCallback(callable $callback): void {
		$this->debugCallback = $callback;
	}

	/**
	 * Connect to ICAP server
	 *
	 * @return resource
	 */
	protected function connect() {
		$stream = @\stream_socket_client(
			"tcp://{$this->host}:{$this->port}",
			$errorCode,
			$errorMessage,
			$this->connectTimeout
		);

		socket_set_timeout($stream, 600);

		if (!$stream) {
			throw new RuntimeException(
				"Cannot connect to \"tcp://{$this->host}:{$this->port}\": $errorMessage (code $errorCode)"
			);
		}

		return $stream;
	}

	/**
	 * Send REQMOD request
	 *
	 * @param string $service ICAP service
	 * @param array $headers
	 * @param array $requestHeaders
	 * @return ICAPRequest Response array
	 */
	public function reqmod(string $service, array $headers, array $requestHeaders): ICAPRequest {
		$stream = $this->connect();
		return new ICAPRequest($stream, $this->host, $service, 'REQMOD', $headers, $requestHeaders, [], $this->debugCallback);
	}

	/**
	 * Send RESPMOD request
	 *
	 * @param string $service ICAP service
	 * @param array $headers
	 * @param array $requestHeaders
	 * @return ICAPRequest Response array
	 */
	public function respmod(string $service, array $headers, array $requestHeaders, array $responseHeaders): ICAPRequest {
		$stream = $this->connect();
		return new ICAPRequest($stream, $this->host, $service, 'RESPMOD', $headers, $requestHeaders, $responseHeaders, $this->debugCallback);
	}
}
