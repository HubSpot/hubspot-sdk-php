<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Objects\Calls\Batch;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Objects\SimplePublicObjectID;

/**
 * Archive a batch of calls by ID. Deleted calls can be restored within 90 days of being deleted, but call recordings recording will be permanently deleted. Learn more about [restoring activity records](https://knowledge.hubspot.com/records/restore-deleted-activity-in-a-record).
 *
 * @see HubSpotSDK\Services\Crm\Objects\Calls\BatchService::delete()
 *
 * @phpstan-import-type SimplePublicObjectIDShape from \HubSpotSDK\Crm\Objects\SimplePublicObjectID
 *
 * @phpstan-type BatchDeleteParamsShape = array{
 *   inputs: list<SimplePublicObjectID|SimplePublicObjectIDShape>
 * }
 */
final class BatchDeleteParams implements BaseModel
{
    /** @use SdkModel<BatchDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<SimplePublicObjectID> $inputs */
    #[Required(list: SimplePublicObjectID::class)]
    public array $inputs;

    /**
     * `new BatchDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchDeleteParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchDeleteParams)->withInputs(...)
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
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

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
}
