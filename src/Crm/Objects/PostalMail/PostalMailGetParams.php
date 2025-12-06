<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\PostalMail;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\Objects\PostalMailService::get()
 *
 * @phpstan-type PostalMailGetParamsShape = array{
 *   archived?: bool,
 *   associations?: list<string>,
 *   idProperty?: string,
 *   properties?: list<string>,
 *   propertiesWithHistory?: list<string>,
 * }
 */
final class PostalMailGetParams implements BaseModel
{
    /** @use SdkModel<PostalMailGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?bool $archived;

    /** @var list<string>|null $associations */
    #[Api(list: 'string', optional: true)]
    public ?array $associations;

    #[Api(optional: true)]
    public ?string $idProperty;

    /** @var list<string>|null $properties */
    #[Api(list: 'string', optional: true)]
    public ?array $properties;

    /** @var list<string>|null $propertiesWithHistory */
    #[Api(list: 'string', optional: true)]
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
     * @param list<string> $associations
     * @param list<string> $properties
     * @param list<string> $propertiesWithHistory
     */
    public static function with(
        ?bool $archived = null,
        ?array $associations = null,
        ?string $idProperty = null,
        ?array $properties = null,
        ?array $propertiesWithHistory = null,
    ): self {
        $obj = new self;

        null !== $archived && $obj['archived'] = $archived;
        null !== $associations && $obj['associations'] = $associations;
        null !== $idProperty && $obj['idProperty'] = $idProperty;
        null !== $properties && $obj['properties'] = $properties;
        null !== $propertiesWithHistory && $obj['propertiesWithHistory'] = $propertiesWithHistory;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }

    /**
     * @param list<string> $associations
     */
    public function withAssociations(array $associations): self
    {
        $obj = clone $this;
        $obj['associations'] = $associations;

        return $obj;
    }

    public function withIDProperty(string $idProperty): self
    {
        $obj = clone $this;
        $obj['idProperty'] = $idProperty;

        return $obj;
    }

    /**
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj['properties'] = $properties;

        return $obj;
    }

    /**
     * @param list<string> $propertiesWithHistory
     */
    public function withPropertiesWithHistory(
        array $propertiesWithHistory
    ): self {
        $obj = clone $this;
        $obj['propertiesWithHistory'] = $propertiesWithHistory;

        return $obj;
    }
}
