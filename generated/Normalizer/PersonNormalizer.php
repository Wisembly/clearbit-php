<?php

namespace Clearbit\Generated\Normalizer;

use Joli\Jane\Reference\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class PersonNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Clearbit\\Generated\\Model\\Person') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Clearbit\Generated\Model\Person) {
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
        $object = new \Clearbit\Generated\Model\Person();
        if (!isset($context['rootSchema'])) {
            $context['rootSchema'] = $object;
        }
        if (property_exists($data, 'id')) {
            $object->setId($data->{'id'});
        }
        if (property_exists($data, 'fuzzy')) {
            $object->setFuzzy($data->{'fuzzy'});
        }
        if (property_exists($data, 'name')) {
            $values = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'name'} as $key => $value) {
                $values[$key] = $value;
            }
            $object->setName($values);
        }
        if (property_exists($data, 'gender')) {
            $object->setGender($data->{'gender'});
        }
        if (property_exists($data, 'location')) {
            $object->setLocation($data->{'location'});
        }
        if (property_exists($data, 'timeZone')) {
            $object->setTimeZone($data->{'timeZone'});
        }
        if (property_exists($data, 'utcOffset')) {
            $object->setUtcOffset($data->{'utcOffset'});
        }
        if (property_exists($data, 'geo')) {
            $object->setGeo($this->serializer->deserialize($data->{'geo'}, 'Clearbit\\Generated\\Model\\Geo', 'raw', $context));
        }
        if (property_exists($data, 'bio')) {
            $object->setBio($data->{'bio'});
        }
        if (property_exists($data, 'site')) {
            $object->setSite($data->{'site'});
        }
        if (property_exists($data, 'avatar')) {
            $object->setAvatar($data->{'avatar'});
        }
        if (property_exists($data, 'employment')) {
            $values_1 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'employment'} as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $object->setEmployment($values_1);
        }
        if (property_exists($data, 'facebook')) {
            $values_2 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'facebook'} as $key_2 => $value_2) {
                $values_2[$key_2] = $value_2;
            }
            $object->setFacebook($values_2);
        }
        if (property_exists($data, 'github')) {
            $values_3 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'github'} as $key_3 => $value_3) {
                $values_3[$key_3] = $value_3;
            }
            $object->setGithub($values_3);
        }
        if (property_exists($data, 'twitter')) {
            $values_4 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'twitter'} as $key_4 => $value_4) {
                $values_4[$key_4] = $value_4;
            }
            $object->setTwitter($values_4);
        }
        if (property_exists($data, 'linkedin')) {
            $values_5 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'linkedin'} as $key_5 => $value_5) {
                $values_5[$key_5] = $value_5;
            }
            $object->setLinkedin($values_5);
        }
        if (property_exists($data, 'googleplus')) {
            $values_6 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'googleplus'} as $key_6 => $value_6) {
                $values_6[$key_6] = $value_6;
            }
            $object->setGoogleplus($values_6);
        }
        if (property_exists($data, 'angellist')) {
            $values_7 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'angellist'} as $key_7 => $value_7) {
                $values_7[$key_7] = $value_7;
            }
            $object->setAngellist($values_7);
        }
        if (property_exists($data, 'aboutme')) {
            $values_8 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'aboutme'} as $key_8 => $value_8) {
                $values_8[$key_8] = $value_8;
            }
            $object->setAboutme($values_8);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getId()) {
            $data->{'id'} = $object->getId();
        }
        if (null !== $object->getFuzzy()) {
            $data->{'fuzzy'} = $object->getFuzzy();
        }
        if (null !== $object->getName()) {
            $values = new \stdClass();
            foreach ($object->getName() as $key => $value) {
                $values->{$key} = $value;
            }
            $data->{'name'} = $values;
        }
        if (null !== $object->getGender()) {
            $data->{'gender'} = $object->getGender();
        }
        if (null !== $object->getLocation()) {
            $data->{'location'} = $object->getLocation();
        }
        if (null !== $object->getTimeZone()) {
            $data->{'timeZone'} = $object->getTimeZone();
        }
        if (null !== $object->getUtcOffset()) {
            $data->{'utcOffset'} = $object->getUtcOffset();
        }
        if (null !== $object->getGeo()) {
            $data->{'geo'} = $this->serializer->serialize($object->getGeo(), 'raw', $context);
        }
        if (null !== $object->getBio()) {
            $data->{'bio'} = $object->getBio();
        }
        if (null !== $object->getSite()) {
            $data->{'site'} = $object->getSite();
        }
        if (null !== $object->getAvatar()) {
            $data->{'avatar'} = $object->getAvatar();
        }
        if (null !== $object->getEmployment()) {
            $values_1 = new \stdClass();
            foreach ($object->getEmployment() as $key_1 => $value_1) {
                $values_1->{$key_1} = $value_1;
            }
            $data->{'employment'} = $values_1;
        }
        if (null !== $object->getFacebook()) {
            $values_2 = new \stdClass();
            foreach ($object->getFacebook() as $key_2 => $value_2) {
                $values_2->{$key_2} = $value_2;
            }
            $data->{'facebook'} = $values_2;
        }
        if (null !== $object->getGithub()) {
            $values_3 = new \stdClass();
            foreach ($object->getGithub() as $key_3 => $value_3) {
                $values_3->{$key_3} = $value_3;
            }
            $data->{'github'} = $values_3;
        }
        if (null !== $object->getTwitter()) {
            $values_4 = new \stdClass();
            foreach ($object->getTwitter() as $key_4 => $value_4) {
                $values_4->{$key_4} = $value_4;
            }
            $data->{'twitter'} = $values_4;
        }
        if (null !== $object->getLinkedin()) {
            $values_5 = new \stdClass();
            foreach ($object->getLinkedin() as $key_5 => $value_5) {
                $values_5->{$key_5} = $value_5;
            }
            $data->{'linkedin'} = $values_5;
        }
        if (null !== $object->getGoogleplus()) {
            $values_6 = new \stdClass();
            foreach ($object->getGoogleplus() as $key_6 => $value_6) {
                $values_6->{$key_6} = $value_6;
            }
            $data->{'googleplus'} = $values_6;
        }
        if (null !== $object->getAngellist()) {
            $values_7 = new \stdClass();
            foreach ($object->getAngellist() as $key_7 => $value_7) {
                $values_7->{$key_7} = $value_7;
            }
            $data->{'angellist'} = $values_7;
        }
        if (null !== $object->getAboutme()) {
            $values_8 = new \stdClass();
            foreach ($object->getAboutme() as $key_8 => $value_8) {
                $values_8->{$key_8} = $value_8;
            }
            $data->{'aboutme'} = $values_8;
        }
        return $data;
    }
}