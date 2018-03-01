<?php

namespace Gammabeam82\Benchmark\Sort;

interface SortInterface
{
    public function sort(array $data): array;

    public function getAlgorithmName(): string;
}
