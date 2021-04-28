<?php namespace OnlineStore\Catalog\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class TestCommand extends Command
{
    /**
     * @var string The console command name.
     */
    protected $name = 'catalog:testcommand';

    /**
     * @var string The console command description.
     */
    protected $description = 'No description provided yet...';

    /**
     * Execute the console command.
     * @return void
     */
    public function handle()
    {
        $value = $this->argument('test');
        $this->output->writeln($value);

        if ($this->option('create_account')) {
            $name = $this->ask('What is your name?');
            $password = $this->secret('What is the password?');

            if ($this->confirm("Create an account with the name {$name} ?")) {
                $this->output->writeln('account created');
            }
        }
    }

    /**
     * Get the console command arguments.
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['test', null, InputArgument::OPTIONAL, 'test getArguments'],
        ];
    }

    /**
     * Get the console command options.
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['create_account', null, InputOption::VALUE_NONE],
        ];
    }
}
