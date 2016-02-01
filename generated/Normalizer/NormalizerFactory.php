<?php

namespace Clearbit\Generated\Normalizer;

use Joli\Jane\Normalizer\ReferenceNormalizer;
use Joli\Jane\Normalizer\NormalizerArray;
class NormalizerFactory
{
    public static function create()
    {
        $normalizers = array();
        $normalizers[] = new ReferenceNormalizer();
        $normalizers[] = new NormalizerArray();
        $normalizers[] = new CombinedNormalizer();
        $normalizers[] = new GeoNormalizer();
        $normalizers[] = new PersonNormalizer();
        $normalizers[] = new CompanyNormalizer();
        return $normalizers;
    }
}