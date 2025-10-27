<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Communications\Batch;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\SimplePublicObjectID;

/**
 * Delete a batch of messages by ID. A deleted message can be restored within 90 days of being deleted. Learn more about [restoring activity records](https://knowledge.hubspot.com/records/restore-deleted-activity-in-a-record).
 *
 * @see HubspotSDK\CRM\Objects\Communications\Batch->delete
 *
 * @phpstan-type batch_delete_params = array{inputs: list<SimplePublicObjectID>}
 */
final class BatchDeleteParams implements BaseModel
{
    /** @use SdkModel<batch_delete_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<SimplePublicObjectID> $inputs */
    #[Api(list: SimplePublicObjectID::class)]
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
     * @param list<SimplePublicObjectID> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

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
}
