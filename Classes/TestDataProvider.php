<?php

namespace Classes;

class TestDataProvider implements DataProviderInterface
{
    public function get(int $offset, int $limit): array
    {
        return array_map(function($a) {
            return [
                'a' => $a,
                'b' => $a % 3,
                'c' => $a % 5,
            ];
        }, range($offset,$offset + $limit));
    }
}