<?php

namespace Clearbit\Generated\Normalizer;

use Joli\Jane\Reference\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class GeoNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Clearbit\\Generated\\Model\\Geo') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Clearbit\Generated\Model\Geo) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (empty($data)) {
            return null;
        }
        if (isset($data->{'$ref'})) {
            return new Reference($data->{'$ref'}, $context['rootSchema'] ?: null);
        }
        $object = new \Clearbit\Generated\Model\Geo();
        if (!isset($context['rootSchema'])) {
            $context['rootSchema'] = $object;
        }
        if (isset($data->{'streetNumber'})) {
            $object->setStreetNumber($data->{'streetNumber'});
        }
        if (isset($data->{'streetName'})) {
            $object->setStreetName($data->{'streetName'});
        }
        if (isset($data->{'subPremise'})) {
            $object->setSubPremise($data->{'subPremise'});
        }
        if (isset($data->{'city'})) {
            $object->setCity($data->{'city'});
        }
        if (isset($data->{'state'})) {
            $object->setState($data->{'state'});
        }
        if (isset($data->{'stateCode'})) {
            $object->setStateCode($data->{'stateCode'});
        }
        if (isset($data->{'postalCode'})) {
            $object->setPostalCode($data->{'postalCode'});
        }
        if (isset($data->{'country'})) {
            $object->setCountry($data->{'country'});
        }
        if (isset($data->{'countryCode'})) {
            $object->setCountryCode($data->{'countryCode'});
        }
        if (isset($data->{'lat'})) {
            $object->setLat($data->{'lat'});
        }
        if (isset($data->{'lng'})) {
            $object->setLng($data->{'lng'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getStreetNumber()) {
            $data->{'streetNumber'} = $object->getStreetNumber();
        }
        if (null !== $object->getStreetName()) {
            $data->{'streetName'} = $object->getStreetName();
        }
        if (null !== $object->getSubPremise()) {
            $data->{'subPremise'} = $object->getSubPremise();
        }
        if (null !== $object->getCity()) {
            $data->{'city'} = $object->getCity();
        }
        if (null !== $object->getState()) {
            $data->{'state'} = $object->getState();
        }
        if (null !== $object->getStateCode()) {
            $data->{'stateCode'} = $object->getStateCode();
        }
        if (null !== $object->getPostalCode()) {
            $data->{'postalCode'} = $object->getPostalCode();
        }
        if (null !== $object->getCountry()) {
            $data->{'country'} = $object->getCountry();
        }
        if (null !== $object->getCountryCode()) {
            $data->{'countryCode'} = $object->getCountryCode();
        }
        if (null !== $object->getLat()) {
            $data->{'lat'} = $object->getLat();
        }
        if (null !== $object->getLng()) {
            $data->{'lng'} = $object->getLng();
        }
        return $data;
    }
}