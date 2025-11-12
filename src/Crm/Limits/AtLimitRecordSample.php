<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type AtLimitRecordSampleShape = array{label: string, objectId: int}
 */
final class AtLimitRecordSample implements BaseModel
{
    /** @use SdkModel<AtLimitRecordSampleShape> */
    use SdkModel;

    #[Api]
    public string $label;

    #[Api]
    public int $objectId;

    /**
     * `new AtLimitRecordSample()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AtLimitRecordSample::with(label: ..., objectId: ...)
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
    public static function with(string $label, int $objectId): self
    {
        $obj = new self;

        $obj->label = $label;
        $obj->objectId = $objectId;

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
        $obj->objectId = $objectID;

        return $obj;
    }
}
