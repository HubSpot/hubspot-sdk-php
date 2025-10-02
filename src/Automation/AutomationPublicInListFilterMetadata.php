<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_public_in_list_filter_metadata = array{
 *   id: string, inListType: string
 * }
 */
final class AutomationPublicInListFilterMetadata implements BaseModel
{
    /** @use SdkModel<automation_public_in_list_filter_metadata> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public string $inListType;

    /**
     * `new AutomationPublicInListFilterMetadata()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationPublicInListFilterMetadata::with(id: ..., inListType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationPublicInListFilterMetadata)->withID(...)->withInListType(...)
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
    public static function with(string $id, string $inListType): self
    {
        $obj = new self;

        $obj->id = $id;
        $obj->inListType = $inListType;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withInListType(string $inListType): self
    {
        $obj = clone $this;
        $obj->inListType = $inListType;

        return $obj;
    }
}
