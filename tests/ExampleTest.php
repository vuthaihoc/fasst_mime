<?php

namespace Thikdev\Mimetypes\Tests;

use PHPUnit\Framework\TestCase;
use ThikDev\FastMime\FileSignalDetector;
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
        $path = tempnam( sys_get_temp_dir(), 'php_');
        file_put_contents( $path, file_get_contents( $file ));
        $mimetype = (new UrlFastMime())->getMime( $file );
        $this->assertEquals($mime, $mimetype, "Detect url " . $ext);
        $detected = FileSignalDetector::detectByFile( $path );
        $this->assertEquals($ext, $detected[1], "Detect file ext");
        $this->assertEquals($mime, $detected[2], "Detect file mime");
        @unlink( $path );
    }
    public function testDocxFile()
    {
        $file = "http://file.fyicenter.com/b/sample.docx";
//        $file = "https://www.business.vic.gov.au/__data/assets/word_doc/0007/1009636/Marketing-Plan-Template.docx";
        $ext = "docx";
        $mime = "application/vnd.openxmlformats-officedocument.wordprocessingml.document";
        $path = tempnam( sys_get_temp_dir(), 'php_');
        file_put_contents( $path, file_get_contents( $file ));
        $mimetype = (new UrlFastMime())->getMime( $file );
        $this->assertEquals($mime, $mimetype, "Detect url " . $ext);
        $detected = FileSignalDetector::detectByFile( $path );
        $this->assertEquals($ext, $detected[1], "Detect file ext");
        $this->assertEquals($mime, $detected[2], "Detect file mime");
        @unlink( $path );
    }
    public function testOdtFile()
    {
        $file = "http://file.fyicenter.com/b/sample.odt";
        $ext = "odt";
        $mime = "application/vnd.oasis.opendocument.text";
        $path = tempnam( sys_get_temp_dir(), 'php_');
        file_put_contents( $path, file_get_contents( $file ));
        $mimetype = (new UrlFastMime())->getMime( $file );
        $this->assertEquals($mime, $mimetype, "Detect url " . $ext);
        $detected = FileSignalDetector::detectByFile( $path );
        $this->assertEquals($ext, $detected[1], "Detect file ext");
        $this->assertEquals($mime, $detected[2], "Detect file mime");
        @unlink( $path );
    }
    public function testPdfFile()
    {
        $file = "http://file.fyicenter.com/a/sample.pdf";
        $ext = "pdf";
        $mime = "application/pdf";
        $path = tempnam( sys_get_temp_dir(), 'php_');
        file_put_contents( $path, file_get_contents( $file ));
        $mimetype = (new UrlFastMime())->getMime( $file );
        $this->assertEquals($mime, $mimetype, "Detect url " . $ext);
        $detected = FileSignalDetector::detectByFile( $path );
        $this->assertEquals($ext, $detected[1], "Detect file ext");
        $this->assertEquals($mime, $detected[2], "Detect file mime");
        @unlink( $path );
    }
    public function testOdsFile()
    {
        $file = "http://file.fyicenter.com/b/sample.ods";
        $ext = "ods";
        $mime = "application/vnd.oasis.opendocument.spreadsheet";
        $path = tempnam( sys_get_temp_dir(), 'php_');
        file_put_contents( $path, file_get_contents( $file ));
        $mimetype = (new UrlFastMime())->getMime( $file );
        $this->assertEquals($mime, $mimetype, "Detect url " . $ext);
        $detected = FileSignalDetector::detectByFile( $path );
        $this->assertEquals($ext, $detected[1], "Detect file ext");
        $this->assertEquals($mime, $detected[2], "Detect file mime");
        @unlink( $path );
    }
    public function testRtfFile()
    {
        $file = "http://file.fyicenter.com/b/sample.rtf";
        $ext = "rtf";
        $mime = "application/rtf";
        $path = tempnam( sys_get_temp_dir(), 'php_');
        file_put_contents( $path, file_get_contents( $file ));
        $mimetype = (new UrlFastMime())->getMime( $file );
        $this->assertEquals($mime, $mimetype, "Detect url " . $ext);
        $detected = FileSignalDetector::detectByFile( $path );
        $this->assertEquals($ext, $detected[1], "Detect file ext");
        $this->assertEquals($mime, $detected[2], "Detect file mime");
        @unlink( $path );
    }
    public function testPptFile()
    {
//        $file = "http://file.fyicenter.com/a/sample.ppt";
        $file = "https://hoatieu.vn/data/file/2020/08/07/file-powerpoint-tap-huan-bo-sach-canh-dieu-tiengg-viet.ppt";
        $ext = "ppt";
        $mime = "application/vnd.ms-powerpoint";
        $path = tempnam( sys_get_temp_dir(), 'php_');
        file_put_contents( $path, file_get_contents( $file ));
        $mimetype = (new UrlFastMime())->getMime( $file );
        $this->assertEquals($mime, $mimetype, "Detect url " . $ext);
        $detected = FileSignalDetector::detectByFile( $path );
        $this->assertEquals($ext, $detected[1], "Detect file ext");
        $this->assertEquals($mime, $detected[2], "Detect file mime");
        @unlink( $path );
    }
    
    
    
}
