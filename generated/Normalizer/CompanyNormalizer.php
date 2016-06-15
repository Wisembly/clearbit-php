<?php

namespace Clearbit\Generated\Normalizer;

use Joli\Jane\Reference\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class CompanyNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Clearbit\\Generated\\Model\\Company') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Clearbit\Generated\Model\Company) {
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
        $object = new \Clearbit\Generated\Model\Company();
        if (!isset($context['rootSchema'])) {
            $context['rootSchema'] = $object;
        }
        if (property_exists($data, 'id')) {
            $object->setId($data->{'id'});
        }
        if (property_exists($data, 'name')) {
            $object->setName($data->{'name'});
        }
        if (property_exists($data, 'legalName')) {
            $object->setLegalName($data->{'legalName'});
        }
        if (property_exists($data, 'domain')) {
            $object->setDomain($data->{'domain'});
        }
        if (property_exists($data, 'domainAliases')) {
            $values = array();
            foreach ($data->{'domainAliases'} as $value) {
                $values[] = $value;
            }
            $object->setDomainAliases($values);
        }
        if (property_exists($data, 'category')) {
            $values_1 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'category'} as $key => $value_1) {
                $values_1[$key] = $value_1;
            }
            $object->setCategory($values_1);
        }
        if (property_exists($data, 'site')) {
            $values_2 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'site'} as $key_1 => $value_2) {
                $values_2[$key_1] = $value_2;
            }
            $object->setSite($values_2);
        }
        if (property_exists($data, 'description')) {
            $object->setDescription($data->{'description'});
        }
        if (property_exists($data, 'tags')) {
            $values_3 = array();
            foreach ($data->{'tags'} as $value_3) {
                $values_3[] = $value_3;
            }
            $object->setTags($values_3);
        }
        if (property_exists($data, 'foundedDate')) {
            $object->setFoundedDate($data->{'foundedDate'});
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
        if (property_exists($data, 'metrics')) {
            $values_4 = array();
            foreach ($data->{'metrics'} as $value_4) {
                $values_4[] = $value_4;
            }
            $object->setMetrics($values_4);
        }
        if (property_exists($data, 'logo')) {
            $object->setLogo($data->{'logo'});
        }
        if (property_exists($data, 'phone')) {
            $object->setPhone($data->{'phone'});
        }
        if (property_exists($data, 'emailProvider')) {
            $object->setEmailProvider($data->{'emailProvider'});
        }
        if (property_exists($data, 'type')) {
            $object->setType($data->{'type'});
        }
        if (property_exists($data, 'tech')) {
            $values_5 = array();
            foreach ($data->{'tech'} as $value_5) {
                $values_5[] = $value_5;
            }
            $object->setTech($values_5);
        }
        if (property_exists($data, 'crunchbase')) {
            $values_6 = array();
            foreach ($data->{'crunchbase'} as $value_6) {
                $values_6[] = $value_6;
            }
            $object->setCrunchbase($values_6);
        }
        if (property_exists($data, 'angellist')) {
            $values_7 = array();
            foreach ($data->{'angellist'} as $value_7) {
                $values_7[] = $value_7;
            }
            $object->setAngellist($values_7);
        }
        if (property_exists($data, 'twitter')) {
            $values_8 = array();
            foreach ($data->{'twitter'} as $value_8) {
                $values_8[] = $value_8;
            }
            $object->setTwitter($values_8);
        }
        if (property_exists($data, 'linkedin')) {
            $values_9 = array();
            foreach ($data->{'linkedin'} as $value_9) {
                $values_9[] = $value_9;
            }
            $object->setLinkedin($values_9);
        }
        if (property_exists($data, 'facebook')) {
            $values_10 = array();
            foreach ($data->{'facebook'} as $value_10) {
                $values_10[] = $value_10;
            }
            $object->setFacebook($values_10);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getId()) {
            $data->{'id'} = $object->getId();
        }
        if (null !== $object->getName()) {
            $data->{'name'} = $object->getName();
        }
        if (null !== $object->getLegalName()) {
            $data->{'legalName'} = $object->getLegalName();
        }
        if (null !== $object->getDomain()) {
            $data->{'domain'} = $object->getDomain();
        }
        if (null !== $object->getDomainAliases()) {
            $values = array();
            foreach ($object->getDomainAliases() as $value) {
                $values[] = $value;
            }
            $data->{'domainAliases'} = $values;
        }
        if (null !== $object->getCategory()) {
            $values_1 = new \stdClass();
            foreach ($object->getCategory() as $key => $value_1) {
                $values_1->{$key} = $value_1;
            }
            $data->{'category'} = $values_1;
        }
        if (null !== $object->getSite()) {
            $values_2 = new \stdClass();
            foreach ($object->getSite() as $key_1 => $value_2) {
                $values_2->{$key_1} = $value_2;
            }
            $data->{'site'} = $values_2;
        }
        if (null !== $object->getDescription()) {
            $data->{'description'} = $object->getDescription();
        }
        if (null !== $object->getTags()) {
            $values_3 = array();
            foreach ($object->getTags() as $value_3) {
                $values_3[] = $value_3;
            }
            $data->{'tags'} = $values_3;
        }
        if (null !== $object->getFoundedDate()) {
            $data->{'foundedDate'} = $object->getFoundedDate();
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
        if (null !== $object->getMetrics()) {
            $values_4 = array();
            foreach ($object->getMetrics() as $value_4) {
                $values_4[] = $value_4;
            }
            $data->{'metrics'} = $values_4;
        }
        if (null !== $object->getLogo()) {
            $data->{'logo'} = $object->getLogo();
        }
        if (null !== $object->getPhone()) {
            $data->{'phone'} = $object->getPhone();
        }
        if (null !== $object->getEmailProvider()) {
            $data->{'emailProvider'} = $object->getEmailProvider();
        }
        if (null !== $object->getType()) {
            $data->{'type'} = $object->getType();
        }
        if (null !== $object->getTech()) {
            $values_5 = array();
            foreach ($object->getTech() as $value_5) {
                $values_5[] = $value_5;
            }
            $data->{'tech'} = $values_5;
        }
        if (null !== $object->getCrunchbase()) {
            $values_6 = array();
            foreach ($object->getCrunchbase() as $value_6) {
                $values_6[] = $value_6;
            }
            $data->{'crunchbase'} = $values_6;
        }
        if (null !== $object->getAngellist()) {
            $values_7 = array();
            foreach ($object->getAngellist() as $value_7) {
                $values_7[] = $value_7;
            }
            $data->{'angellist'} = $values_7;
        }
        if (null !== $object->getTwitter()) {
            $values_8 = array();
            foreach ($object->getTwitter() as $value_8) {
                $values_8[] = $value_8;
            }
            $data->{'twitter'} = $values_8;
        }
        if (null !== $object->getLinkedin()) {
            $values_9 = array();
            foreach ($object->getLinkedin() as $value_9) {
                $values_9[] = $value_9;
            }
            $data->{'linkedin'} = $values_9;
        }
        if (null !== $object->getFacebook()) {
            $values_10 = array();
            foreach ($object->getFacebook() as $value_10) {
                $values_10[] = $value_10;
            }
            $data->{'facebook'} = $values_10;
        }
        return $data;
    }
}