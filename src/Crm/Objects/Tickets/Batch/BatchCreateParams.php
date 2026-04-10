<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Objects\Tickets\Batch;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Objects\SimplePublicObjectBatchInputForCreate;

/**
 * Create a batch of tickets. The `inputs` array can contain a `properties` object to define property values for the ticket, along with an `associations` array to define [associations](https://developers.hubspot.com/docs/guides/api/crm/associations/associations-v4) with other CRM records.
 *
 * @see HubSpotSDK\Services\Crm\Objects\Tickets\BatchService::create()
 *
 * @phpstan-import-type SimplePublicObjectBatchInputForCreateShape from \HubSpotSDK\Crm\Objects\SimplePublicObjectBatchInputForCreate
 *
 * @phpstan-type BatchCreateParamsShape = array{
 *   inputs: list<SimplePublicObjectBatchInputForCreate|SimplePublicObjectBatchInputForCreateShape>,
 * }
 */
final class BatchCreateParams implements BaseModel
{
    /** @use SdkModel<BatchCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<SimplePublicObjectBatchInputForCreate> $inputs */
    #[Required(list: SimplePublicObjectBatchInputForCreate::class)]
    public array $inputs;

    /**
     * `new BatchCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchCreateParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchCreateParams)->withInputs(...)
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
     * @param list<SimplePublicObjectBatchInputForCreate|SimplePublicObjectBatchInputForCreateShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<SimplePublicObjectBatchInputForCreate|SimplePublicObjectBatchInputForCreateShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
