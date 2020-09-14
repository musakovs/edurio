<?php

namespace Classes;

interface DownloadInterface
{
    /**
     * @param DataProviderInterface $dataRepository
     * @param array $params
     * @return mixed
     */
    public function download(DataProviderInterface $dataRepository, array $params = []);
}