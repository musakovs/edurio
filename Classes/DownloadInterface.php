<?php

namespace Classes;

interface DownloadInterface
{
    /**
     * @param DataRepository $dataRepository
     * @param array $params
     * @return mixed
     */
    public function download(DataRepository $dataRepository, array $params = []);
}