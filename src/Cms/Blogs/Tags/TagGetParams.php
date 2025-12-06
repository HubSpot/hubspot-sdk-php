<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Tags;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the Blog Tag object identified by the id in the path.
 *
 * @see HubspotSDK\Services\Cms\Blogs\TagsService::get()
 *
 * @phpstan-type TagGetParamsShape = array{archived?: bool, property?: string}
 */
final class TagGetParams implements BaseModel
{
    /** @use SdkModel<TagGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Specifies whether to return deleted Blog Tags. Defaults to `false`.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    #[Api(optional: true)]
    public ?string $property;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?bool $archived = null,
        ?string $property = null
    ): self {
        $obj = new self;

        null !== $archived && $obj['archived'] = $archived;
        null !== $property && $obj['property'] = $property;

        return $obj;
    }

    /**
     * Specifies whether to return deleted Blog Tags. Defaults to `false`.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }

    public function withProperty(string $property): self
    {
        $obj = clone $this;
        $obj['property'] = $property;

        return $obj;
    }
}
