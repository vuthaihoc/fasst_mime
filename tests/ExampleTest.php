<?php

namespace Thikdev\Mimetypes\Tests;

use PHPUnit\Framework\TestCase;
use ThikDev\FastMime\UrlFastMime;
use ThikDev\Mimetypes\FileMime;

class ExampleTest extends TestCase
{
    /** @test */
    public function testDocFile()
    {
        $file = "http://file.fyicenter.com/a/sample.doc";
        $ext = "doc";
        $mime = "application/msword";
        $mimetype = (new UrlFastMime())->getMime( $file );
        $this->assertEquals($mimetype, $mime, "Detect file " . $ext);
    }
    public function testDocxFile()
    {
        $file = "http://file.fyicenter.com/b/sample.docx";
        $ext = "docx";
        $mime = "application/vnd.openxmlformats-officedocument.wordprocessingml.document";
        $mimetype = (new UrlFastMime())->getMime( $file );
        $this->assertEquals($mimetype, $mime, "Detect file " . $ext);
    }
    public function testOdtFile()
    {
        $file = "http://file.fyicenter.com/b/sample.odt";
        $ext = "odt";
        $mime = "application/vnd.oasis.opendocument.text";
        $mimetype = (new UrlFastMime())->getMime( $file );
        $this->assertEquals($mimetype, $mime, "Detect file " . $ext);
    }
    public function testPdfFile()
    {
        $file = "http://file.fyicenter.com/b/sample.odt";
        $ext = "odt";
        $mime = "application/vnd.oasis.opendocument.text";
        $mimetype = (new UrlFastMime())->getMime( $file );
        $this->assertEquals($mimetype, $mime, "Detect file " . $ext);
    }
    public function testOdsFile()
    {
        $file = "http://file.fyicenter.com/b/sample.ods";
        $ext = "ods";
        $mime = "application/vnd.oasis.opendocument.spreadsheet";
        $mimetype = (new UrlFastMime())->getMime( $file );
        $this->assertEquals($mimetype, $mime, "Detect file " . $ext);
    }
    public function testRtfFile()
    {
        $file = "http://file.fyicenter.com/b/sample.rtf";
        $ext = "rtf";
        $mime = "application/rtf";
        $mimetype = (new UrlFastMime())->getMime( $file );
        $this->assertEquals($mimetype, $mime, "Detect file " . $ext);
    }
    public function testPptFile()
    {
        $file = "http://file.fyicenter.com/a/sample.ppt";
        $ext = "ppt";
        $mime = "application/vnd.ms-powerpoint";
        $mimetype = (new UrlFastMime())->getMime( $file );
        $this->assertEquals($mimetype, $mime, "Detect file " . $ext);
    }
    
    
    
}
