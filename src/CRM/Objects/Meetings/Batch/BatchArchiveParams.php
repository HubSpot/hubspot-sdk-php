<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Meetings\Batch;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\SimplePublicObjectID;

/**
 * Archive a batch of meetings by ID.
 *
 * @see HubspotSDK\CRM\Objects\Meetings\Batch->archive
 *
 * @phpstan-type batch_archive_params = array{inputs: list<SimplePublicObjectID>}
 */
final class BatchArchiveParams implements BaseModel
{
    /** @use SdkModel<batch_archive_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<SimplePublicObjectID> $inputs */
    #[Api(list: SimplePublicObjectID::class)]
    public array $inputs;

    /**
     * `new BatchArchiveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchArchiveParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchArchiveParams)->withInputs(...)
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
