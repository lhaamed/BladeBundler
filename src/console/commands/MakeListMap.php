<?php

namespace lhaamed\BladeBundler\console\commands;

use Illuminate\Console\GeneratorCommand;

class MakeListMap extends GeneratorCommand
{
    // Command signature
    protected $name = 'make:list-map';

    // Description
    protected $description = 'Create a new ListMap class';

    // Type for info messages
    protected $type = 'ListMap';

    /**
     * Get the stub file for the generator.
     */
    protected function getStub(): string
    {
        return __DIR__.'/../../stubs/listMap.stub';
    }

    /**
     * Get the default namespace for the class.
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        // Put it inside App\ListMaps (you can change this)
        return $rootNamespace.'\\ListMaps';
    }
}
