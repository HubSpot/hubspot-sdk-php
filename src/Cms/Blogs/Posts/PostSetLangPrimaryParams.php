<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Set the primary language of a [multi-language group](https://developers.hubspot.com/docs/guides/cms/content/multi-language-content) to the language of the provided post (specified as an ID in the request body).
 *
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
    #[Api]
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
        $obj = new self;

        $obj['id'] = $id;

        return $obj;
    }

    /**
     * ID of object to set as primary in multi-language group.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }
}
