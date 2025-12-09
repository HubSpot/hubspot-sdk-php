<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Authors;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Detach a Blog Author from a multi-language group.
 *
 * @see HubspotSDK\Services\Cms\Blogs\AuthorsService::detachFromLangGroup()
 *
 * @phpstan-type AuthorDetachFromLangGroupParamsShape = array{id: string}
 */
final class AuthorDetachFromLangGroupParams implements BaseModel
{
    /** @use SdkModel<AuthorDetachFromLangGroupParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of the object to remove from a multi-language group.
     */
    #[Required]
    public string $id;

    /**
     * `new AuthorDetachFromLangGroupParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AuthorDetachFromLangGroupParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AuthorDetachFromLangGroupParams)->withID(...)
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
