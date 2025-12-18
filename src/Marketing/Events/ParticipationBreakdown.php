<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ParticipationAssociationsShape from \HubspotSDK\Marketing\Events\ParticipationAssociations
 * @phpstan-import-type ParticipationPropertiesShape from \HubspotSDK\Marketing\Events\ParticipationProperties
 *
 * @phpstan-type ParticipationBreakdownShape = array{
 *   id: string,
 *   associations: ParticipationAssociations|ParticipationAssociationsShape,
 *   createdAt: \DateTimeInterface,
 *   properties: ParticipationProperties|ParticipationPropertiesShape,
 * }
 */
final class ParticipationBreakdown implements BaseModel
{
    /** @use SdkModel<ParticipationBreakdownShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public ParticipationAssociations $associations;

    #[Required]
    public \DateTimeInterface $createdAt;

    #[Required]
    public ParticipationProperties $properties;

    /**
     * `new ParticipationBreakdown()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ParticipationBreakdown::with(
     *   id: ..., associations: ..., createdAt: ..., properties: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ParticipationBreakdown)
     *   ->withID(...)
     *   ->withAssociations(...)
     *   ->withCreatedAt(...)
     *   ->withProperties(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ParticipationAssociations|ParticipationAssociationsShape $associations
     * @param ParticipationProperties|ParticipationPropertiesShape $properties
     */
    public static function with(
        string $id,
        ParticipationAssociations|array $associations,
        \DateTimeInterface $createdAt,
        ParticipationProperties|array $properties,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['associations'] = $associations;
        $self['createdAt'] = $createdAt;
        $self['properties'] = $properties;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param ParticipationAssociations|ParticipationAssociationsShape $associations
     */
    public function withAssociations(
        ParticipationAssociations|array $associations
    ): self {
        $self = clone $this;
        $self['associations'] = $associations;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param ParticipationProperties|ParticipationPropertiesShape $properties
     */
    public function withProperties(
        ParticipationProperties|array $properties
    ): self {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }
}
