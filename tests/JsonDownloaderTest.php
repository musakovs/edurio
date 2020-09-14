<?php

use PHPUnit\Framework\TestCase;

class JsonDownloaderTest extends TestCase
{
    public function testDownload()
    {
        $dataProvider = new \Classes\TestDataProvider();
        $jsonDownloader = new \Classes\JsonDownloader();

        $jsonDownloader->download($dataProvider, [
            'page' => 1,
            'page_size' => 10
        ]);

        $this->expectOutputString(
            json_encode($dataProvider->get(0, 10))
        );
    }
}