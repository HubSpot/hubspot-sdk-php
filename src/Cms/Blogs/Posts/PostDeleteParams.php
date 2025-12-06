<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete a blog post by ID.
 *
 * @see HubspotSDK\Services\Cms\Blogs\PostsService::delete()
 *
 * @phpstan-type PostDeleteParamsShape = array{archived?: bool}
 */
final class PostDeleteParams implements BaseModel
{
    /** @use SdkModel<PostDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Whether to return only results that have been deleted.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $archived = null): self
    {
        $obj = new self;

        null !== $archived && $obj['archived'] = $archived;

        return $obj;
    }

    /**
     * Whether to return only results that have been deleted.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }
}
