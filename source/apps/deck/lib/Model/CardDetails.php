<?php
/**
 * @copyright Copyright (c) 2022 Raul Ferreira Fuentes <raul@nextcloud.com>
 *
 * @author Raul Ferreira Fuentes <raul@nextcloud.com>
 *
 * @license GNU AGPL version 3 or any later version
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as
 *  published by the Free Software Foundation, either version 3 of the
 *  License, or (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
namespace OCA\Deck\Model;

use OCA\Deck\Db\Board;
use OCA\Deck\Db\Card;

class CardDetails extends Card {
	private Card $card;
	private ?Board $board;

	public function __construct(Card $card, ?Board $board = null) {
		parent::__construct();
		$this->card = $card;
		$this->board = $board;
	}

	public function setBoard(?Board $board): void {
		$this->board = $board;
	}

	public function jsonSerialize(array $extras = []): array {
		$array = parent::jsonSerialize();
		$array['overdue'] = $this->getDueStatus();

		unset($array['notified']);
		unset($array['descriptionPrev']);
		unset($array['relatedStack']);
		unset($array['relatedBoard']);

		$array = $this->card->jsonSerialize();
		unset($array['notified'], $array['descriptionPrev'], $array['relatedStack'], $array['relatedBoard']);

		$array['overdue'] = $this->getDueStatus();
		$this->appendBoardDetails($array);

		return $array;
	}

	private function getDueStatus(): int {
		$diffDays = $this->getDaysUntilDue();
		if ($diffDays === null || $diffDays > 1) {
			return static::DUEDATE_FUTURE;
		}
		if ($diffDays === 1) {
			return static::DUEDATE_NEXT;
		}
		if ($diffDays === 0) {
			return static::DUEDATE_NOW;
		}

		return static::DUEDATE_OVERDUE;
	}

	private function appendBoardDetails(&$array): void {
		if (!$this->board) {
			return;
		}

		$array['boardId'] = $this->board->id;
		$array['board'] = (new BoardSummary($this->board))->jsonSerialize();
	}

	protected function getter(string $name): mixed {
		return $this->card->getter($name);
	}

	public function __call(string $methodName, array $args) {
		return $this->card->__call($methodName, $args);
	}
}
