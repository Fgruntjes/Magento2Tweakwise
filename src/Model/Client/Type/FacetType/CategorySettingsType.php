<?php
/**
 * @author : Edwin Jacobs, email: ejacobs@emico.nl.
 * @copyright : Copyright Emico B.V. 2019.
 */

namespace Emico\Tweakwise\Model\Client\Type\FacetType;

/**
 * The min_depth and max_depth are not yet exposed in tweakwise api
 * implement this correctly when they are
 *
 * Class CategorySettingsType
 * @package Emico\Tweakwise\Model\Client\Type\FacetType
 */
class CategorySettingsType extends SettingsType
{
    /**
     * @return int
     */
    public function getMinDepth()
    {
        return (int) $this->getDataValue('min_depth') ?: 2;
    }

    /**
     * @return int
     */
    public function getMaxDepth()
    {
        return (int) $this->getDataValue('max_depth') ?: 10000;
    }
}