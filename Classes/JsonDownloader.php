<?php

namespace Classes;

class JsonDownloader implements DownloadInterface
{
    private $perPage = 50;

    /**
     * @param DataRepository $dataRepository
     * @param array $params
     * @throws \Exception
     */
    public function download(DataRepository $dataRepository, array $params = [])
    {
        $this->validateParams($params);

        $data = $dataRepository->get($this->offset($params['page']), $this->perPage);

        echo json_encode($data);
    }

    private function offset(int $page): int
    {
        return $this->perPage * ($page - 1);
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
    }
}