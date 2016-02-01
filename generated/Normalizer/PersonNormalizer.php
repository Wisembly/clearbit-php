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
        if (isset($data->{'id'})) {
            $object->setId($data->{'id'});
        }
        if (isset($data->{'fuzzy'})) {
            $object->setFuzzy($data->{'fuzzy'});
        }
        if (isset($data->{'name'})) {
            $values = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'name'} as $key => $value) {
                $values[$key] = $value;
            }
            $object->setName($values);
        }
        if (isset($data->{'gender'})) {
            $object->setGender($data->{'gender'});
        }
        if (isset($data->{'location'})) {
            $object->setLocation($data->{'location'});
        }
        if (isset($data->{'timeZone'})) {
            $object->setTimeZone($data->{'timeZone'});
        }
        if (isset($data->{'utcOffset'})) {
            $object->setUtcOffset($data->{'utcOffset'});
        }
        if (isset($data->{'geo'})) {
            $object->setGeo($this->serializer->deserialize($data->{'geo'}, 'Clearbit\\Generated\\Model\\Geo', 'raw', $context));
        }
        if (isset($data->{'bio'})) {
            $object->setBio($data->{'bio'});
        }
        if (isset($data->{'site'})) {
            $object->setSite($data->{'site'});
        }
        if (isset($data->{'avatar'})) {
            $object->setAvatar($data->{'avatar'});
        }
        if (isset($data->{'employment'})) {
            $values_0 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'employment'} as $key_2 => $value_1) {
                $values_0[$key_2] = $value_1;
            }
            $object->setEmployment($values_0);
        }
        if (isset($data->{'facebook'})) {
            $values_3 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'facebook'} as $key_5 => $value_4) {
                $values_3[$key_5] = $value_4;
            }
            $object->setFacebook($values_3);
        }
        if (isset($data->{'github'})) {
            $values_6 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'github'} as $key_8 => $value_7) {
                $values_6[$key_8] = $value_7;
            }
            $object->setGithub($values_6);
        }
        if (isset($data->{'twitter'})) {
            $values_9 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'twitter'} as $key_11 => $value_10) {
                $values_9[$key_11] = $value_10;
            }
            $object->setTwitter($values_9);
        }
        if (isset($data->{'linkedin'})) {
            $values_12 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'linkedin'} as $key_14 => $value_13) {
                $values_12[$key_14] = $value_13;
            }
            $object->setLinkedin($values_12);
        }
        if (isset($data->{'googleplus'})) {
            $values_15 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'googleplus'} as $key_17 => $value_16) {
                $values_15[$key_17] = $value_16;
            }
            $object->setGoogleplus($values_15);
        }
        if (isset($data->{'angellist'})) {
            $values_18 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'angellist'} as $key_20 => $value_19) {
                $values_18[$key_20] = $value_19;
            }
            $object->setAngellist($values_18);
        }
        if (isset($data->{'aboutme'})) {
            $values_21 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'aboutme'} as $key_23 => $value_22) {
                $values_21[$key_23] = $value_22;
            }
            $object->setAboutme($values_21);
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
            $values_24 = new \stdClass();
            foreach ($object->getName() as $key_26 => $value_25) {
                $values_24->{$key_26} = $value_25;
            }
            $data->{'name'} = $values_24;
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
            $values_27 = new \stdClass();
            foreach ($object->getEmployment() as $key_29 => $value_28) {
                $values_27->{$key_29} = $value_28;
            }
            $data->{'employment'} = $values_27;
        }
        if (null !== $object->getFacebook()) {
            $values_30 = new \stdClass();
            foreach ($object->getFacebook() as $key_32 => $value_31) {
                $values_30->{$key_32} = $value_31;
            }
            $data->{'facebook'} = $values_30;
        }
        if (null !== $object->getGithub()) {
            $values_33 = new \stdClass();
            foreach ($object->getGithub() as $key_35 => $value_34) {
                $values_33->{$key_35} = $value_34;
            }
            $data->{'github'} = $values_33;
        }
        if (null !== $object->getTwitter()) {
            $values_36 = new \stdClass();
            foreach ($object->getTwitter() as $key_38 => $value_37) {
                $values_36->{$key_38} = $value_37;
            }
            $data->{'twitter'} = $values_36;
        }
        if (null !== $object->getLinkedin()) {
            $values_39 = new \stdClass();
            foreach ($object->getLinkedin() as $key_41 => $value_40) {
                $values_39->{$key_41} = $value_40;
            }
            $data->{'linkedin'} = $values_39;
        }
        if (null !== $object->getGoogleplus()) {
            $values_42 = new \stdClass();
            foreach ($object->getGoogleplus() as $key_44 => $value_43) {
                $values_42->{$key_44} = $value_43;
            }
            $data->{'googleplus'} = $values_42;
        }
        if (null !== $object->getAngellist()) {
            $values_45 = new \stdClass();
            foreach ($object->getAngellist() as $key_47 => $value_46) {
                $values_45->{$key_47} = $value_46;
            }
            $data->{'angellist'} = $values_45;
        }
        if (null !== $object->getAboutme()) {
            $values_48 = new \stdClass();
            foreach ($object->getAboutme() as $key_50 => $value_49) {
                $values_48->{$key_50} = $value_49;
            }
            $data->{'aboutme'} = $values_48;
        }
        return $data;
    }
}