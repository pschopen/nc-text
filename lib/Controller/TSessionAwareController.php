<?php

declare(strict_types=1);

namespace OCA\Text\Controller;

use OCA\Text\Db\Document;
use OCA\Text\Db\Session;
use OCA\Text\Exception\InvalidSessionException;

trait TSessionAwareController {
	private ?Session $textSession = null;
	private ?Document $document = null;

	public function setSession(?Session $session): void {
		$this->textSession = $session;
	}

	public function setDocument(?Document $document): void {
		$this->document = $document;
	}

	public function getSession(): Session {
		if ($this->textSession === null) {
			throw new InvalidSessionException();
		}

		return $this->textSession;
	}

	public function getDocument(): Document {
		if ($this->document === null) {
			throw new InvalidSessionException();
		}

		return $this->document;
	}

}
