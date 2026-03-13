<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Contracts\Batch;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\SimplePublicObjectID;

/**
 * Retrieve records by record ID or include the `idProperty` parameter to retrieve records by a custom unique value property.
 *
 * @see HubspotSDK\Services\Crm\Objects\Contracts\BatchService::get()
 *
 * @phpstan-import-type SimplePublicObjectIDShape from \HubspotSDK\Crm\SimplePublicObjectID
 *
 * @phpstan-type BatchGetParamsShape = array{
 *   inputs: list<SimplePublicObjectID|SimplePublicObjectIDShape>,
 *   properties: list<string>,
 *   propertiesWithHistory: list<string>,
 *   archived?: bool|null,
 *   idProperty?: string|null,
 * }
 */
final class BatchGetParams implements BaseModel
{
    /** @use SdkModel<BatchGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<SimplePublicObjectID> $inputs */
    #[Required(list: SimplePublicObjectID::class)]
    public array $inputs;

    /**
     * Key-value pairs for setting properties for the new object.
     *
     * @var list<string> $properties
     */
    #[Required(list: 'string')]
    public array $properties;

    /**
     * Key-value pairs for setting properties for the new object and their histories.
     *
     * @var list<string> $propertiesWithHistory
     */
    #[Required(list: 'string')]
    public array $propertiesWithHistory;

    /**
     * Whether to return only results that have been archived.
     */
    #[Optional]
    public ?bool $archived;

    /**
     * A unique property used to identify objects instead of the default ID.
     */
    #[Optional]
    public ?string $idProperty;

    /**
     * `new BatchGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchGetParams::with(inputs: ..., properties: ..., propertiesWithHistory: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchGetParams)
     *   ->withInputs(...)
     *   ->withProperties(...)
     *   ->withPropertiesWithHistory(...)
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
     * @param list<SimplePublicObjectID|SimplePublicObjectIDShape> $inputs
     * @param list<string> $properties
     * @param list<string> $propertiesWithHistory
     */
    public static function with(
        array $inputs,
        array $properties,
        array $propertiesWithHistory,
        ?bool $archived = null,
        ?string $idProperty = null,
    ): self {
        $self = new self;

        $self['inputs'] = $inputs;
        $self['properties'] = $properties;
        $self['propertiesWithHistory'] = $propertiesWithHistory;

        null !== $archived && $self['archived'] = $archived;
        null !== $idProperty && $self['idProperty'] = $idProperty;

        return $self;
    }

    /**
     * @param list<SimplePublicObjectID|SimplePublicObjectIDShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * Key-value pairs for setting properties for the new object.
     *
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * Key-value pairs for setting properties for the new object and their histories.
     *
     * @param list<string> $propertiesWithHistory
     */
    public function withPropertiesWithHistory(
        array $propertiesWithHistory
    ): self {
        $self = clone $this;
        $self['propertiesWithHistory'] = $propertiesWithHistory;

        return $self;
    }

    /**
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * A unique property used to identify objects instead of the default ID.
     */
    public function withIDProperty(string $idProperty): self
    {
        $self = clone $this;
        $self['idProperty'] = $idProperty;

        return $self;
    }
}
