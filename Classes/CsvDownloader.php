<?php

namespace Classes;

class CsvDownloader implements DownloadInterface
{

    public function download(DataRepository $dataRepository, array $params = [])
    {
        header("Content-Disposition: attachment; filename=test.csv;");
        header("Content-Type: csv");

        $offset = 0;
        $limit  = 1000;

        do {
            $string = '';
            $data = $dataRepository->get($offset, $limit);
            $offset += $limit;

            foreach ($data as $row) {
                $string .= implode(',', $row) . PHP_EOL;
            }

            echo $string;
            ob_flush();
            flush();

        } while (!empty($data));
    }
}