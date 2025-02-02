<?php

namespace MauticPlugin\MauticDbPluginTestBundle\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\ClassMetadata as ORMClassMetadata;
use Mautic\CoreBundle\Doctrine\Mapping\ClassMetadataBuilder;
use Mautic\CoreBundle\Entity\CommonEntity;

class DbTest extends CommonEntity
{
    private ?int $id;

    private ?\DateTimeImmutable $someDate;

    public static function loadMetadata(ORMClassMetadata $metadata): void
    {
        $builder = new ClassMetadataBuilder($metadata);
        $builder->setTable('db_test')->setCustomRepositoryClass(DbTestRepository::class);
        $builder->addId();
        $builder->addNullableField('someDate', Types::DATETIME_IMMUTABLE, 'some_date');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSomeDate(): ?\DateTimeImmutable
    {
        return $this->someDate;
    }

    public function setSomeDate(?\DateTimeImmutable $someDate): void
    {
        $this->isChanged(
            'someDate',
            null === $someDate ? null : \DateTime::createFromImmutable($someDate)
        );
        $this->someDate = $someDate;
    }
}
