<?php

namespace DTL\WorseReflection\Tests;

use DTL\WorseReflection\Reflector;
use DTL\WorseReflection\SourceLocator;
use PhpParser\ParserFactory;
use DTL\WorseReflection\SourceContextFactory;
use DTL\WorseReflection\SourceLocator\ComposerSourceLocator;
use DTL\WorseReflection\Source;
use DTL\WorseReflection\SourceLocator\StringSourceLocator;

class IntegrationTestCase extends \PHPUnit_Framework_TestCase
{
    public function getReflectorForSource(Source $source)
    {
        return new Reflector(
            new StringSourceLocator($source),
            new SourceContextFactory($this->getParser())
        );
    }

    public function getParser()
    {
        return (new ParserFactory())->create(ParserFactory::PREFER_PHP7);
    }
}
