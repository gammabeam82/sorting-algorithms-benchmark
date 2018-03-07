<?php

namespace Gammabeam82\Benchmark\Command;

use Gammabeam82\Benchmark\Provider\DataProviderInterface;
use Gammabeam82\Benchmark\Provider\SortProviderInterface;
use Gammabeam82\Benchmark\Sort\SortInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Stopwatch\Stopwatch;

class BenchmarkCommand extends Command
{
    private const TOTAL = 100;

    /**
     * @var DataProviderInterface
     */
    private $dataProvider;

    /**
     * @var SortProviderInterface
     */
    private $sortProvider;

    /**
     * @param DataProviderInterface $dataProvider
     *
     * @return BenchmarkCommand
     */
    public function setDataProvider(DataProviderInterface $dataProvider): BenchmarkCommand
    {
        $this->dataProvider = $dataProvider;

        return $this;
    }

    /**
     * @param SortProviderInterface $sortProvider
     *
     * @return BenchmarkCommand
     */
    public function setSortProvider(SortProviderInterface $sortProvider): BenchmarkCommand
    {
        $this->sortProvider = $sortProvider;

        return $this;
    }

    /**
     * @inheritdoc
     */
    protected function configure()
    {
        $this
            ->setName('benchmark:run')
            ->setDescription('')
            ->addArgument(
                'total',
                InputArgument::OPTIONAL,
                '',
                self::TOTAL
            );
    }

    /**
     * @inheritdoc
     */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->dataProvider->generateData();
    }

    /**
     * @inheritdoc
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $data = $this->dataProvider->getData();

        $num = (int)$input->getArgument('total');

        if (1 > $num) {
            throw new \InvalidArgumentException();
        }

        $io = new SymfonyStyle($input, $output);
        $io->progressStart(count($this->sortProvider) * $num);

        $results = [];

        $stopwatch = new Stopwatch();
        $stopwatch->start('benchmark');

        foreach ($this->sortProvider as $sort) {
            /** @var SortInterface $sort*/
            $event = $sort->getAlgorithmName();

            $stopwatch->start($event);

            for ($i = 0; $i < $num; $i++) {
                $sort->sort($data);
                $io->progressAdvance();
            }

            $results[$event] = $stopwatch->stop($event)->getDuration();
        }

        asort($results);

        $benchmarkEvent = $stopwatch->stop('benchmark');
        $totalTime = round(($benchmarkEvent->getDuration()) / 1000, 4);

        $io->progressFinish();

        $io->success(sprintf("Done in %s sec.", $totalTime));

        $this->showTable($io, $results);
    }

    /**
     * @param SymfonyStyle $io
     * @param array $data
     */
    private function showTable(SymfonyStyle $io, array $data): void
    {
        $position = 1;
        $results = [];
        $prev = 0;

        $fastest = reset($data);

        foreach ($data as $name => $duration) {
            if (1 === $position) {
                $diff = '-';
                $fDiff = '-';
            } else {
                $diff = $this->getPercentageDiff($duration, $prev);
                $fDiff = $this->getPercentageDiff($duration, $fastest);
            }

            $results[] = [
                $position, $name, $duration, round($duration / $fastest, 3), $diff, $fDiff
            ];

            $prev = $duration;
            $position++;
        }

        $io->table(
            ['Pos.', 'Algorithm', 'Duration (ms)', 'Performance', 'Slower than previous', 'Slower than fastest'],
            $results
        );
    }

    /**
     * @param int $newValue
     * @param int $oldValue
     *
     * @return string
     */
    private function getPercentageDiff(int $newValue, int $oldValue): string
    {
        return sprintf(
            "%s%%",
            abs(ceil((($oldValue - $newValue) / $oldValue) * 100))
        );
    }
}
