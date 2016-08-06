<?php
namespace Task;

use Mage\Task\AbstractTask;

class Permisos extends AbstractTask
{
    public function getName()
    {
        return 'Permisos en releases';
    }

    public function run()
    {
        //$chown = 'chown -R root:www-data releases';
        $chown = 'chmod -R a+w /var/www/logge';
        $resultado = $this->runCommandRemote($chown);

        return $resultado;
    }
}
