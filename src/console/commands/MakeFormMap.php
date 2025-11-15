<?php

namespace lhaamed\BladeBundler\console\commands;

use Illuminate\Console\GeneratorCommand;

class MakeFormMap extends GeneratorCommand
{
    // Command signature
    protected $name = 'make:form-map';

    // Description
    protected $description = 'Create a new FormMap class';

    // Type for info messages
    protected $type = 'FormMap';

    /**
     * Get the stub file for the generator.
     */
    protected function getStub(): string
    {
        return __DIR__.'/../../stubs/formMap.stub';
    }

    /**
     * Get the default namespace for the class.
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        // Put it inside App\ListMaps (you can change this)
        return $rootNamespace.'\\FormMaps';
    }
}
