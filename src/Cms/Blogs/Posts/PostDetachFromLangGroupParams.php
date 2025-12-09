<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Detach a blog post from a [multi-language group](https://developers.hubspot.com/docs/guides/cms/content/multi-language-content).
 *
 * @see HubspotSDK\Services\Cms\Blogs\PostsService::detachFromLangGroup()
 *
 * @phpstan-type PostDetachFromLangGroupParamsShape = array{id: string}
 */
final class PostDetachFromLangGroupParams implements BaseModel
{
    /** @use SdkModel<PostDetachFromLangGroupParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of the object to remove from a multi-language group.
     */
    #[Required]
    public string $id;

    /**
     * `new PostDetachFromLangGroupParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PostDetachFromLangGroupParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PostDetachFromLangGroupParams)->withID(...)
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
     * ID of the object to remove from a multi-language group.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }
}
