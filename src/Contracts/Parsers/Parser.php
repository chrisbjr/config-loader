<?php namespace Aedart\Config\Loader\Contracts\Parsers;

use Aedart\Config\Loader\Exceptions\FileDoesNotExistException;
use Aedart\Config\Loader\Exceptions\ParseException;
use Aedart\Laravel\Helpers\Contracts\Filesystem\FileAware;

/**
 * <h1>Configuration Parser</h1>
 *
 * Responsible for parsing a given configuration file type into
 * a php array
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Config\Loader\Parsers
 */
interface Parser extends FileAware{

    /**
     * Returns the file extension, which this parser
     * is responsible for parsing
     *
     * @return string
     */
    public static function getFileType();

    /**
     * Set the path of the configuration file that
     * needs to be parsed by this parser
     *
     * @param string $filePath
     *
     * @return $this
     *
     * @throws FileDoesNotExistException If the given file does not exist
     */
    public function setFilePath($filePath);

    /**
     * Get the path of the configuration file that
     * needs to be parsed by this parser
     *
     * @return string|null
     */
    public function getFilePath();

    /**
     * Check if this parser has a configuration file path
     * set or not
     *
     * @return bool
     */
    public function hasFilePath();

    /**
     * Loads the specified configuration file's content
     * and parses it to an array
     *
     * @return array Key value pair
     *
     * @see parse()
     *
     * @throws ParseException If given file's content could not be parsed
     */
    public function loadAndParse();

    /**
     * Parse the given content into an array
     *
     * @param string $content
     *
     * @return array
     *
     * @throws ParseException If given content could not be parsed
     */
    public function parse($content);
}