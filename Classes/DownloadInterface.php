<?php

namespace Classes;

interface DownloadInterface
{
    public function download(DataRepository $dataRepository, array $params = []);
}