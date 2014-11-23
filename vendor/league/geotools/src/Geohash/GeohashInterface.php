<?php

/**
 * This file is part of the Geotools library.
 *
 * (c) Antoine Corcy <contact@sbin.dk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\Geotools\Geohash;

use League\Geotools\Coordinate\CoordinateInterface;

/**
 * Geohash interface
 *
 * @author Antoine Corcy <contact@sbin.dk>
 */
interface GeohashInterface
{
    /**
     * Returns a geo hash string.
     *
     * @param CoordinateInterface $coordinate The coordinate to encode.
     * @param integer             $length     The length of the hash between 1 to 12 by default (optional).
     *
     * @return GeohashInterface
     *
     * @throws InvalidArgumentException
     */
    public function encode(CoordinateInterface $coordinate, $length = self::MAX_LENGTH);

    /**
     * Returns the decoded geo hash to it's center.
     * Note that the coordinate that you used to generate the geo hash may be
     * anywhere in the geo hash's bounding box and therefore you should not expect
     * them to be identical.
     *
     * @param string $geohash The geo hash string to decode.
     *
     * @return GeohashInterface
     *
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public function decode($geohash);
}
