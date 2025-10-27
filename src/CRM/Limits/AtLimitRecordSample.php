<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Limits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type at_limit_record_sample = array{label: string, objectID: int}
 */
final class AtLimitRecordSample implements BaseModel
{
    /** @use SdkModel<at_limit_record_sample> */
    use SdkModel;

    #[Api]
    public string $label;

    #[Api('objectId')]
    public int $objectID;

    /**
     * `new AtLimitRecordSample()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AtLimitRecordSample::with(label: ..., objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AtLimitRecordSample)->withLabel(...)->withObjectID(...)
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
     */
    public static function with(string $label, int $objectID): self
    {
        $obj = new self;

        $obj->label = $label;
        $obj->objectID = $objectID;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    public function withObjectID(int $objectID): self
    {
        $obj = clone $this;
        $obj->objectID = $objectID;

        return $obj;
    }
}
