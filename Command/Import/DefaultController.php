<?php

namespace librarianphp\Import;

use Minicli\Command\CommandController;

class DefaultController extends CommandController
{
    public function handle(): void
    {
        $this->info("Import posts from DEV.", true);
        $this->info("./librarian import devto");
    }
}
