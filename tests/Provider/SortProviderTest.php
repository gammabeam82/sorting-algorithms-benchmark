<?php

namespace Tests\Provider;

use Gammabeam82\Benchmark\Provider\SortProvider;
use Gammabeam82\Benchmark\Sort\SortInterface;
use PHPUnit\Framework\TestCase;

class SortProviderTest extends TestCase
{
    /**
     * @var SortProvider
     */
    private $provider;

    public function setUp()
    {
        $this->provider = new SortProvider();
    }

    public function testData()
    {
        foreach ($this->provider as $sort) {
            $this->assertInstanceOf(SortInterface::class, $sort);
        }
    }
}
