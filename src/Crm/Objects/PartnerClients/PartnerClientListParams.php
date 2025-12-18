<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\PartnerClients;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\Objects\PartnerClientsService::list()
 *
 * @phpstan-type PartnerClientListParamsShape = array{
 *   after?: string|null,
 *   archived?: bool|null,
 *   associations?: list<string>|null,
 *   limit?: int|null,
 *   properties?: list<string>|null,
 *   propertiesWithHistory?: list<string>|null,
 * }
 */
final class PartnerClientListParams implements BaseModel
{
    /** @use SdkModel<PartnerClientListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $after;

    #[Optional]
    public ?bool $archived;

    /** @var list<string>|null $associations */
    #[Optional(list: 'string')]
    public ?array $associations;

    #[Optional]
    public ?int $limit;

    /** @var list<string>|null $properties */
    #[Optional(list: 'string')]
    public ?array $properties;

    /** @var list<string>|null $propertiesWithHistory */
    #[Optional(list: 'string')]
    public ?array $propertiesWithHistory;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $associations
     * @param list<string>|null $properties
     * @param list<string>|null $propertiesWithHistory
     */
    public static function with(
        ?string $after = null,
        ?bool $archived = null,
        ?array $associations = null,
        ?int $limit = null,
        ?array $properties = null,
        ?array $propertiesWithHistory = null,
    ): self {
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $archived && $self['archived'] = $archived;
        null !== $associations && $self['associations'] = $associations;
        null !== $limit && $self['limit'] = $limit;
        null !== $properties && $self['properties'] = $properties;
        null !== $propertiesWithHistory && $self['propertiesWithHistory'] = $propertiesWithHistory;

        return $self;
    }

    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * @param list<string> $associations
     */
    public function withAssociations(array $associations): self
    {
        $self = clone $this;
        $self['associations'] = $associations;

        return $self;
    }

    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * @param list<string> $propertiesWithHistory
     */
    public function withPropertiesWithHistory(
        array $propertiesWithHistory
    ): self {
        $self = clone $this;
        $self['propertiesWithHistory'] = $propertiesWithHistory;

        return $self;
    }
}
