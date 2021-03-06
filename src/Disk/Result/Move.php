<?php
/**
 * Created by PhpStorm.
 * User: dnkolosov
 * Date: 15.01.2018
 * Time: 13:35
 * @author Denis Kolosov <kdnn@mail.ru>
 */

namespace Leonied7\Yandex\Disk\Result;

use Leonied7\Yandex\Disk\Entity\Result;

/**
 * Class Move осуществляет работу с результатов ответа типа Move
 * @package Leonied7\Yandex\Disk\Result
 */
class Move extends Result
{
    /**
     * должен возвращать список удовлетворяющих кодов ответов от диска
     * @return array
     */
    protected function getGoodCode()
    {
        return [
            201
        ];
    }

    /**
     * вызывается только если тип ответа xml формата
     * @return mixed - возвращаемое значение попадёт в prepare
     */
    protected function prepareDom()
    {
        return null;
    }
}