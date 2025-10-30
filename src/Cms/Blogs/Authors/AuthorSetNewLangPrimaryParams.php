<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Authors;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Set a Blog Author as the primary language of a multi-language group.
 *
 * @see HubspotSDK\Cms\Blogs\Authors->setNewLangPrimary
 *
 * @phpstan-type AuthorSetNewLangPrimaryParamsShape = array{id: string}
 */
final class AuthorSetNewLangPrimaryParams implements BaseModel
{
    /** @use SdkModel<AuthorSetNewLangPrimaryParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of object to set as primary in multi-language group.
     */
    #[Api]
    public string $id;

    /**
     * `new AuthorSetNewLangPrimaryParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AuthorSetNewLangPrimaryParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AuthorSetNewLangPrimaryParams)->withID(...)
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

    /**
     * ID of object to set as primary in multi-language group.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }
}
