<?php

namespace Clearbit\Generated\Normalizer;

use Joli\Jane\Reference\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class CombinedNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Clearbit\\Generated\\Model\\Combined') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Clearbit\Generated\Model\Combined) {
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
        $object = new \Clearbit\Generated\Model\Combined();
        if (!isset($context['rootSchema'])) {
            $context['rootSchema'] = $object;
        }
        if (property_exists($data, 'person')) {
            $object->setPerson($this->serializer->deserialize($data->{'person'}, 'Clearbit\\Generated\\Model\\Person', 'raw', $context));
        }
        if (property_exists($data, 'company')) {
            $object->setCompany($this->serializer->deserialize($data->{'company'}, 'Clearbit\\Generated\\Model\\Company', 'raw', $context));
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getPerson()) {
            $data->{'person'} = $this->serializer->serialize($object->getPerson(), 'raw', $context);
        }
        if (null !== $object->getCompany()) {
            $data->{'company'} = $this->serializer->serialize($object->getCompany(), 'raw', $context);
        }
        return $data;
    }
}