<?php

namespace Classes;

class JsonDownloader implements DownloadInterface
{
    /**
     * @param DataRepository $dataRepository
     * @param array $params
     * @throws \Exception
     */
    public function download(DataProviderInterface $dataRepository, array $params = [])
    {
        $this->validateParams($params);

        $page    = (int)$params['page'];
        $perPage = (int)$params['page_size'];

        $data = $dataRepository->get($this->offset($page, $perPage), $perPage);

        echo json_encode($data);
    }

    /**
     * @param int $page
     * @param int $perPage
     * @return int
     */
    private function offset(int $page, int $perPage): int
    {
        return $perPage * ($page - 1);
    }

    /**
     * @param array $params
     * @throws \Exception
     */
    private function validateParams(array $params): void
    {
        if (
            !isset($params['page'])
            || !is_numeric($params['page'])
            || $params['page'] < 1
        ) {
            throw new \Exception('Invalid page');
        }

        if (
            !isset($params['page_size'])
            || !is_numeric($params['page_size'])
            || $params['page_size'] < 1
        ) {
            throw new \Exception('Invalid page size');
        }
    }
}