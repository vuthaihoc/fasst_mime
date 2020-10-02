# Detect Mimetype of file, url

- Phát hiện định dạng file sử dụng MagicNumber
- Phát hiện định dạng file được tải xuống từ url ưu tiên sử dụng header trả về

# Usage

## Install

    composer require vuthaihoc/fasst_mime
    

## Usage 

- Từ file

```php
$file = "sample.pdf";
$detected = FileSignalDetector::detectByFile($file) // output ["document","pdf","application/pdf"]
```

- Từ URL

```php
$file = "http://file.fyicenter.com/b/sample.ods";
$ext = "ods";
$mime = "application/vnd.oasis.opendocument.spreadsheet";
$mimetype = (new UrlFastMime())->getMime( $file );
```

