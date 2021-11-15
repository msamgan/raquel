<?php

namespace Msamgan\Raquel\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Console\Command\Command as CommandAlias;

class MakeRawQuery extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:query {queryName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a new raw query';

    /**
     * @var string
     */
    protected $baseDirectory = 'queries';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        Storage::disk('local')->makeDirectory($this->baseDirectory);

        $fileDistribution = explode('/', $this->argument('queryName'));
        $lastCount = (count($fileDistribution) - 1);
        $fileDistribution[$lastCount] = Str::snake($fileDistribution[$lastCount], '.') . '.sql';

        $fileName = implode('/', $fileDistribution);

        Storage::disk('local')->put(
            $this->baseDirectory . DIRECTORY_SEPARATOR . $fileName,
            '# new MySQL query created on : ' . now()
        );

        return CommandAlias::SUCCESS;
    }
}
