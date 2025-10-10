<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Deals\Batch;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Objects\SimplePublicObjectID;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new BatchReadParams); // set properties as needed
 * $client->crm.objects.deals.batch->read(...$params->toArray());
 * ```
 * Read a batch of deals by internal ID, or unique property values.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.objects.deals.batch->read(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Objects\Deals\Batch->read
 *
 * @phpstan-type batch_read_params = array{
 *   inputs: list<SimplePublicObjectID>,
 *   properties: list<string>,
 *   propertiesWithHistory: list<string>,
 *   archived?: bool,
 *   idProperty?: string,
 * }
 */
final class BatchReadParams implements BaseModel
{
    /** @use SdkModel<batch_read_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<SimplePublicObjectID> $inputs */
    #[Api(list: SimplePublicObjectID::class)]
    public array $inputs;

    /** @var list<string> $properties */
    #[Api(list: 'string')]
    public array $properties;

    /** @var list<string> $propertiesWithHistory */
    #[Api(list: 'string')]
    public array $propertiesWithHistory;

    #[Api(optional: true)]
    public ?bool $archived;

    #[Api(optional: true)]
    public ?string $idProperty;

    /**
     * `new BatchReadParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchReadParams::with(inputs: ..., properties: ..., propertiesWithHistory: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchReadParams)
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
     * @param list<SimplePublicObjectID> $inputs
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
        $obj = new self;

        $obj->inputs = $inputs;
        $obj->properties = $properties;
        $obj->propertiesWithHistory = $propertiesWithHistory;

        null !== $archived && $obj->archived = $archived;
        null !== $idProperty && $obj->idProperty = $idProperty;

        return $obj;
    }

    /**
     * @param list<SimplePublicObjectID> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }

    /**
     * @param list<string> $propertiesWithHistory
     */
    public function withPropertiesWithHistory(
        array $propertiesWithHistory
    ): self {
        $obj = clone $this;
        $obj->propertiesWithHistory = $propertiesWithHistory;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    public function withIDProperty(string $idProperty): self
    {
        $obj = clone $this;
        $obj->idProperty = $idProperty;

        return $obj;
    }
}
