<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type detach_from_lang_group_request_v_next = array{id: string}
 */
final class DetachFromLangGroupRequestVNext implements BaseModel
{
    /** @use SdkModel<detach_from_lang_group_request_v_next> */
    use SdkModel;

    #[Api]
    public string $id;

    /**
     * `new DetachFromLangGroupRequestVNext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DetachFromLangGroupRequestVNext::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DetachFromLangGroupRequestVNext)->withID(...)
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
    public static function with(string $id): self
    {
        $obj = new self;

        $obj->id = $id;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }
}
