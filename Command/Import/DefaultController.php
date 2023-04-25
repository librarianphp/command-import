<?php

namespace librarianphp\Import;

use Minicli\Command\CommandController;

class DefaultController extends CommandController
{
    public function handle(): void
    {
        $this->getPrinter()->info("Import posts from DEV.", true);
        $this->getPrinter()->info("./librarian import devto");
    }
}
