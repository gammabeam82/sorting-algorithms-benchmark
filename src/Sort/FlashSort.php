<?php

namespace Gammabeam82\Benchmark\Sort;

class FlashSort implements SortInterface
{
    public const NAME = 'FlashSort';

    /**
     * @param array $data
     *
     * @return array
     */
    public function sort(array $data): array
    {
        $max = 0;
        $min = $data[0];
        $length = count($data);
        $m = floor(0.45 * $length);
        $l = array_fill(0, $m, 0);

        for ($i = 1; $i < $length; $i++) {
            if ($data[$i] < $min) {
                $min = $data[$i];
            }
            if ($data[$i] > $data[$max]) {
                $max = $i;
            }
        }

        if ($min === $data[$max]) {
            return $data;
        }

        $c1 = ($m - 1) / ($data[$max] - $min);

        for ($j = 0; $j < $length; $j++) {
            $k = (int)floor($c1 * ($data[$j] - $min));
            $l[$k]++;
        }

        for ($p = 1; $p < $m; $p++) {
            $l[$p] = $l[$p] + $l[$p - 1];
        }

        $hold = $data[$max];
        $data[$max] = $data[0];
        $data[0] = $hold;
        $move = 0;
        $j = 0;
        $k = $m - 1;

        while ($move < ($length - 1)) {
            while ($j > ($l[$k] - 1)) {
                $j++;
                $k = floor($c1 * ($data[$j] - $min));
            }

            if ($k < 0) {
                break;
            }

            $flash = $data[$j];

            while ($j !== $l[$k]) {
                $k = (int)floor($c1 * ($flash - $min));
                $hold = $data[$t = --$l[$k]];
                $data[$t] = $flash;
                $flash = $hold;

                $move++;
            }
        }

        for ($j = 1; $j < $length; $j++) {
            $hold = $data[$j];
            $i = $j - 1;

            while ($i >= 0 && $data[$i] > $hold) {
                $data[$i + 1] = $data[$i--];
            }

            $data[$i + 1] = $hold;
        }

        return $data;
    }

    /**
     * @return string
     */
    public function getAlgorithmName(): string
    {
        return self::NAME;
    }
}
