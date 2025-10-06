<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Tags;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type set_new_language_primary_request_v_next = array{id: string}
 */
final class SetNewLanguagePrimaryRequestVNext implements BaseModel
{
    /** @use SdkModel<set_new_language_primary_request_v_next> */
    use SdkModel;

    #[Api]
    public string $id;

    /**
     * `new SetNewLanguagePrimaryRequestVNext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SetNewLanguagePrimaryRequestVNext::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SetNewLanguagePrimaryRequestVNext)->withID(...)
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
