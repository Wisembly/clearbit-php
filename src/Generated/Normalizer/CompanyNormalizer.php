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
        if (isset($data->{'id'})) {
            $object->setId($data->{'id'});
        }
        if (isset($data->{'name'})) {
            $object->setName($data->{'name'});
        }
        if (isset($data->{'legalName'})) {
            $object->setLegalName($data->{'legalName'});
        }
        if (isset($data->{'domain'})) {
            $object->setDomain($data->{'domain'});
        }
        if (isset($data->{'domainAliases'})) {
            $values_51 = array();
            foreach ($data->{'domainAliases'} as $value_52) {
                $values_51[] = $value_52;
            }
            $object->setDomainAliases($values_51);
        }
        if (isset($data->{'sites'})) {
            $values_53 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'sites'} as $key_55 => $value_54) {
                $values_53[$key_55] = $value_54;
            }
            $object->setSites($values_53);
        }
        if (isset($data->{'description'})) {
            $object->setDescription($data->{'description'});
        }
        if (isset($data->{'tags'})) {
            $values_56 = array();
            foreach ($data->{'tags'} as $value_57) {
                $values_56[] = $value_57;
            }
            $object->setTags($values_56);
        }
        if (isset($data->{'foundedDate'})) {
            $object->setFoundedDate($data->{'foundedDate'});
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
        if (isset($data->{'metrics'})) {
            $values_58 = array();
            foreach ($data->{'metrics'} as $value_59) {
                $values_58[] = $value_59;
            }
            $object->setMetrics($values_58);
        }
        if (isset($data->{'logo'})) {
            $object->setLogo($data->{'logo'});
        }
        if (isset($data->{'phone'})) {
            $object->setPhone($data->{'phone'});
        }
        if (isset($data->{'emailProvider'})) {
            $object->setEmailProvider($data->{'emailProvider'});
        }
        if (isset($data->{'type'})) {
            $object->setType($data->{'type'});
        }
        if (isset($data->{'tech'})) {
            $values_60 = array();
            foreach ($data->{'tech'} as $value_61) {
                $values_60[] = $value_61;
            }
            $object->setTech($values_60);
        }
        if (isset($data->{'crunchbase'})) {
            $values_62 = array();
            foreach ($data->{'crunchbase'} as $value_63) {
                $values_62[] = $value_63;
            }
            $object->setCrunchbase($values_62);
        }
        if (isset($data->{'angellist'})) {
            $values_64 = array();
            foreach ($data->{'angellist'} as $value_65) {
                $values_64[] = $value_65;
            }
            $object->setAngellist($values_64);
        }
        if (isset($data->{'twitter'})) {
            $values_66 = array();
            foreach ($data->{'twitter'} as $value_67) {
                $values_66[] = $value_67;
            }
            $object->setTwitter($values_66);
        }
        if (isset($data->{'linkedin'})) {
            $values_68 = array();
            foreach ($data->{'linkedin'} as $value_69) {
                $values_68[] = $value_69;
            }
            $object->setLinkedin($values_68);
        }
        if (isset($data->{'facebook'})) {
            $values_70 = array();
            foreach ($data->{'facebook'} as $value_71) {
                $values_70[] = $value_71;
            }
            $object->setFacebook($values_70);
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
            $values_72 = array();
            foreach ($object->getDomainAliases() as $value_73) {
                $values_72[] = $value_73;
            }
            $data->{'domainAliases'} = $values_72;
        }
        if (null !== $object->getSites()) {
            $values_74 = new \stdClass();
            foreach ($object->getSites() as $key_76 => $value_75) {
                $values_74->{$key_76} = $value_75;
            }
            $data->{'sites'} = $values_74;
        }
        if (null !== $object->getDescription()) {
            $data->{'description'} = $object->getDescription();
        }
        if (null !== $object->getTags()) {
            $values_77 = array();
            foreach ($object->getTags() as $value_78) {
                $values_77[] = $value_78;
            }
            $data->{'tags'} = $values_77;
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
            $values_79 = array();
            foreach ($object->getMetrics() as $value_80) {
                $values_79[] = $value_80;
            }
            $data->{'metrics'} = $values_79;
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
            $values_81 = array();
            foreach ($object->getTech() as $value_82) {
                $values_81[] = $value_82;
            }
            $data->{'tech'} = $values_81;
        }
        if (null !== $object->getCrunchbase()) {
            $values_83 = array();
            foreach ($object->getCrunchbase() as $value_84) {
                $values_83[] = $value_84;
            }
            $data->{'crunchbase'} = $values_83;
        }
        if (null !== $object->getAngellist()) {
            $values_85 = array();
            foreach ($object->getAngellist() as $value_86) {
                $values_85[] = $value_86;
            }
            $data->{'angellist'} = $values_85;
        }
        if (null !== $object->getTwitter()) {
            $values_87 = array();
            foreach ($object->getTwitter() as $value_88) {
                $values_87[] = $value_88;
            }
            $data->{'twitter'} = $values_87;
        }
        if (null !== $object->getLinkedin()) {
            $values_89 = array();
            foreach ($object->getLinkedin() as $value_90) {
                $values_89[] = $value_90;
            }
            $data->{'linkedin'} = $values_89;
        }
        if (null !== $object->getFacebook()) {
            $values_91 = array();
            foreach ($object->getFacebook() as $value_92) {
                $values_91[] = $value_92;
            }
            $data->{'facebook'} = $values_91;
        }
        return $data;
    }
}