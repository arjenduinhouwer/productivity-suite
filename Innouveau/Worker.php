<?php
/**
 * Created by PhpStorm.
 * User: arjen
 * Date: 11/8/17
 * Time: 2:59 PM
 */

namespace Innouveau;


class Worker extends \Thread
{
    public function __construct($i)
    {
        $this->i = $i;
    }

    public function run()
    {
        while(true)
        {
            echo $this->i;
            sleep(1);
        }
    }
}