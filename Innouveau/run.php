<?php
/**
 * Created by PhpStorm.
 * User: arjen
 * Date: 11/8/17
 * Time: 3:02 PM
 */

require __DIR__ . '/Worker.php';


for($i =0; $i<100; $i++)
{
    $workers[$i] = new \Innouveau\Worker($i);
    $workers[$i]->start();
}