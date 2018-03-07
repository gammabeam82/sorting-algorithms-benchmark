<?php

namespace Gammabeam82\Benchmark\Provider;

interface DataProviderInterface
{
    public function generateData(int $size = null): void;

    public function getData(): array;
}
