<?php

/*
 * This file is part of the sfcalculator package.
 * (c) Aula de Software Libre <aulasoftwarelibre@uco.es>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class Numbers
{
    /**
     * @var float
     * @Assert\NotBlank()
     * @Assert\Type(type="float")
     */
    private $a;
    /**
     * @var float
     * @Assert\NotBlank()
     * @Assert\Type(type="float")
     */
    private $b;

    public function __construct(float $a, float $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    /**
     * @return float
     */
    public function getA(): float
    {
        return $this->a;
    }

    /**
     * @param float $a
     *
     * @return Numbers
     */
    public function setA(float $a): self
    {
        $this->a = $a;

        return $this;
    }

    /**
     * @return float
     */
    public function getB(): float
    {
        return $this->b;
    }

    /**
     * @param float $b
     *
     * @return Numbers
     */
    public function setB(float $b): self
    {
        $this->b = $b;

        return $this;
    }
}
