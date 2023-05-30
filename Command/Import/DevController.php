<?php

namespace librarianphp\Import;

use Librarian\Exception\ApiException;
use Librarian\Provider\DevtoServiceProvider;
use Minicli\Command\CommandController;

class DevController extends CommandController
{
    public function handle(): void
    {
        /** @var DevtoServiceProvider $devto */
        $devto = $this->getApp()->devto;
        $app_debug = $this->getApp()->config->app_debug;

        if ($devto === null) {
            if ($app_debug) {
                $this->error('ERROR: dev.to service not found. Perhaps you forgot to register it?');
            }
            exit;
        }

        if (!$this->getApp()->config->devto_username) {
            if ($app_debug) {
                $this->error(
                    "ERROR: dev.to username not set.\n" .
                "You must define a devto_username in your config file\n" .
                "if you want to import posts from that platform."
                );
            }
            exit;
        }

        $this->info("Starting import... this might take a few minutes.");

        try {
            $devto->fetchAll();
        } catch (ApiException $e) {
            $this->error($e->getMessage());
        }

        $this->success("Import Finished.");
    }
}
