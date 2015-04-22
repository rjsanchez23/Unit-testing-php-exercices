<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 21/04/2015
 * Time: 16:43
 */

namespace Mpwar\Contracts;


interface EntityRepository {
    public function store($entity);
}