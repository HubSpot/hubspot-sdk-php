<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\PostalMail;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\Objects\PostalMailService::get()
 *
 * @phpstan-type PostalMailGetParamsShape = array{
 *   archived?: bool|null,
 *   associations?: list<string>|null,
 *   idProperty?: string|null,
 *   properties?: list<string>|null,
 *   propertiesWithHistory?: list<string>|null,
 * }
 */
final class PostalMailGetParams implements BaseModel
{
    /** @use SdkModel<PostalMailGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?bool $archived;

    /** @var list<string>|null $associations */
    #[Optional(list: 'string')]
    public ?array $associations;

    #[Optional]
    public ?string $idProperty;

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
        ?bool $archived = null,
        ?array $associations = null,
        ?string $idProperty = null,
        ?array $properties = null,
        ?array $propertiesWithHistory = null,
    ): self {
        $self = new self;

        null !== $archived && $self['archived'] = $archived;
        null !== $associations && $self['associations'] = $associations;
        null !== $idProperty && $self['idProperty'] = $idProperty;
        null !== $properties && $self['properties'] = $properties;
        null !== $propertiesWithHistory && $self['propertiesWithHistory'] = $propertiesWithHistory;

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

    public function withIDProperty(string $idProperty): self
    {
        $self = clone $this;
        $self['idProperty'] = $idProperty;

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
