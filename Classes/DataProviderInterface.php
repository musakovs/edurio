<?php

namespace Classes;

interface DataProviderInterface
{
    public function get(int $offset, int $limit): array;
}