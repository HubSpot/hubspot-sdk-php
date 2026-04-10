<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Blogs\Tags;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Set a Blog Tag as the primary language of a multi-language group.
 *
 * @see HubSpotSDK\Services\Cms\Blogs\TagsService::setLangPrimary()
 *
 * @phpstan-type TagSetLangPrimaryParamsShape = array{id: string}
 */
final class TagSetLangPrimaryParams implements BaseModel
{
    /** @use SdkModel<TagSetLangPrimaryParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of object to set as primary in multi-language group.
     */
    #[Required]
    public string $id;

    /**
     * `new TagSetLangPrimaryParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TagSetLangPrimaryParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TagSetLangPrimaryParams)->withID(...)
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
