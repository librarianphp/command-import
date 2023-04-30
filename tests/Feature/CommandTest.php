<?php

test('command "import" is correctly loaded', function () {
    $app = getLibrarianApp();
    $app->runCommand(['librarian', 'import']);
})->expectOutputRegex("/import devto/");

test('command "import devto" is correctly loaded', function () {
    $app = getLibrarianApp();
    $app->runCommand(['librarian', 'import', 'dev']);
})->expectOutputRegex("/Starting import.../");


