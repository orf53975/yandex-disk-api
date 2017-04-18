<?php
/**
 * Created by PhpStorm.
 * User: dnkolosov
 * Date: 10.04.2017
 * Time: 14:03
 */

namespace Yandex\Protocol\Method;

use FluidXml\FluidXml;
use Yandex\Common\Prop;
use Yandex\Common\PropPool;

class Propfind implements Method
{
    protected $xml;

    protected $method;

    /**
     * @var Prop[]
     */
    protected $props = array();

    function __construct()
    {
        $this->xml = new FluidXml('propfind');

        $this->xml->setAttribute('xmlns', 'DAV:');

    }

    /**
     * @param PropPool $prop
     *
     * @return $this
     */
    function setProp(PropPool $prop)
    {
        $this->props = $prop->getProps();

        return $this;
    }

    function getProp()
    {
        $this->method = 'prop';

        return $this;
    }

    function getAllProp()
    {
        $this->method = 'allprop';

        return $this;
    }

    function getPropName()
    {
        $this->method = 'propname';

        return $this;
    }

    function xml()
    {
        if(!$this->method)
            throw new \Exception('method is empty');


        $method = $this->xml->addChild($this->method, true);

        if($this->method === 'prop')
        {
            foreach($this->props as $prop)
            {
                $arProp = array();

                if($prop->getNamespace())
                    $arProp['@xmlns'] = $prop->getNamespace();

                $method->addChild(array(
                    $prop->getName() => $arProp
                ));
            }
        }

        return $this->xml->xml();
    }
}