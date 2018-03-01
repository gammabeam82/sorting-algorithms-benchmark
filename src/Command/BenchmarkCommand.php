<?php

namespace Gammabeam82\Benchmark\Command;

use Gammabeam82\Benchmark\Provider\DataProvider;
use Gammabeam82\Benchmark\Provider\SortProvider;
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
     * @var DataProvider
     */
    private $dataProvider;

    /**
     * @var SortProvider
     */
    private $sortProvider;

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
        $this->dataProvider = new DataProvider();
        $this->sortProvider = new SortProvider();

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
     * @param array $data
     */
    private function showTable(SymfonyStyle $io, array $data): void
    {
        $position = 1;
        $results = [];

        $fastest = reset($data);

        foreach ($data as $name => $duration) {
            $results[] = [
                $position, $name, $duration, round($duration / $fastest, 3)
            ];
            $position++;
        }

        $io->table(['Pos.', 'Algorithm', 'Duration (ms)', 'Performance'], $results);
    }
}
