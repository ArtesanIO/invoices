<?php
namespace Task;

use Mage\Task\AbstractTask;

class Migrate extends AbstractTask
{
    public function getName()
    {
        return 'Migrate';
    }

    public function run()
    {
        return $this->runCommandRemote('php app/console doctrine:migrations:execute 20160308162119');
    }
}
