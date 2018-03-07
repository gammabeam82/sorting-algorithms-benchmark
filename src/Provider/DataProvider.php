<?php

namespace Gammabeam82\Benchmark\Provider;

class DataProvider implements DataProviderInterface
{
    private const SIZE = 500;

    /**
     * @var array
     */
    private $data;

    /**
     * @param int|null $size
     */
    public function generateData(int $size = null): void
    {
        $size = $size ?? self::SIZE;

        if (1 >= $size) {
            throw new \InvalidArgumentException();
        }

        $data = range(1, $size);
        shuffle($data);

        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}
