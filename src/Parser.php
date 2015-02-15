<?php
namespace Saft\StoreInterface;

//unfinished
abstract class Parser
{
    /**
     * Returns the formats this store can import.
     *
     * @return array
     */
    abstract public function getSupportedImportFormats();
    
    /**
     *
     * @param string $graphUri
     * @param string $locator Either a URL or a absolute file name.
     * @param string $type One of:
     *        - 'auto' => Tries to detect the type automatically in the following order:
     *           1. Detect XML by XML-Header => rdf/xml
     *           2. If this fails use the extension of the file
     *           3. If this fails throw an exception
     *        - 'xml'
     *        - 'n3' or 'nt'
     * @return boolean On success
     */
    abstract public function importRdf($graphUri, $locator, $type = 'auto');

    /**
     * Returns the formats this store can export.
     * @return array
     */
    abstract public function getSupportedExportFormats();

    /**
     * @param string $graphUri
     * @param string $serializationType One of:
     *        - 'xml', default
     *        - 'n3' or 'nt'
     * @param mixed $filename Either a string containing a absolute filename or null. In case null is given,
     * this method returns a string containing the serialization.
     * @return string/null
     */
    abstract public function exportRdf($graphUri, $serializationType = 'xml', $filename = null);
}
