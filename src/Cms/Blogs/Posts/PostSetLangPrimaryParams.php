<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Cms\Blogs\PostsService::setLangPrimary()
 *
 * @phpstan-type PostSetLangPrimaryParamsShape = array{id: string}
 */
final class PostSetLangPrimaryParams implements BaseModel
{
    /** @use SdkModel<PostSetLangPrimaryParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of object to set as primary in multi-language group.
     */
    #[Required]
    public string $id;

    /**
     * `new PostSetLangPrimaryParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PostSetLangPrimaryParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PostSetLangPrimaryParams)->withID(...)
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
        $self = new self;

        $self['id'] = $id;

        return $self;
    }

    /**
     * ID of object to set as primary in multi-language group.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }
}
