<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
;

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@Symfony' => true,
        '@PSR12' => true,
        'no_useless_return' => true,
        'no_useless_else' => true,
        'phpdoc_order' => true,
    ])
    ->setFinder($finder)
    ;
