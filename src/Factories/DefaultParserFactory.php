<?php namespace Aedart\Config\Loader\Factories;

use Aedart\Config\Loader\Contracts\Factories\ParserFactory;
use Aedart\Config\Loader\Contracts\Parsers\Parser;
use Aedart\Config\Loader\Exceptions\NoParserFoundException;
use Aedart\Config\Loader\Parsers\Ini;
use Aedart\Config\Loader\Parsers\Json;
use Aedart\Config\Loader\Parsers\PHPArray;
use Aedart\Config\Loader\Parsers\Yaml;

/**
 * <h1>Default Parser Factory</h1>
 *
 * Provides a default set of parsers
 *
 * @see ParserFactory
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Config\Loader\Factories
 */
class DefaultParserFactory implements ParserFactory{

    /**
     * Creates and returns a configuration parser, for the
     * given file extension
     *
     * @param string $fileExtension
     *
     * @return Parser
     *
     * @throws NoParserFoundException If no parser could be created for the given file extension
     */
    public function make($fileExtension) {

        $ext = strtolower($fileExtension);

        switch($ext){

            case PHPArray::getFileType():
                return new PHPArray();
                break;

            case Json::getFileType():
                return new Json();
                break;

            case Ini::getFileType():
                return new Ini();
                break;

            case Yaml::getFileType():
            case 'yaml':                // Backwards compatibility
                return new Yaml();
                break;

            default:
                throw new NoParserFoundException(sprintf('No parser is available for the "%s" file extension', $fileExtension));
                break;
        }
    }
}