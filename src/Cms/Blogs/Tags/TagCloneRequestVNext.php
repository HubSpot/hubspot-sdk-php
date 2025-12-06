<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Tags;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Request body object for cloning blog tags.
 *
 * @phpstan-type TagCloneRequestVNextShape = array{
 *   id: string,
 *   name: string,
 *   language?: string|null,
 *   primaryLanguage?: string|null,
 * }
 */
final class TagCloneRequestVNext implements BaseModel
{
    /** @use SdkModel<TagCloneRequestVNextShape> */
    use SdkModel;

    /**
     * ID of the object to be cloned.
     */
    #[Api]
    public string $id;

    /**
     * Name of newly cloned blog tag.
     */
    #[Api]
    public string $name;

    /**
     * Target language of new variant.
     */
    #[Api(optional: true)]
    public ?string $language;

    /**
     * Language of primary blog tag to clone.
     */
    #[Api(optional: true)]
    public ?string $primaryLanguage;

    /**
     * `new TagCloneRequestVNext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TagCloneRequestVNext::with(id: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TagCloneRequestVNext)->withID(...)->withName(...)
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
    public static function with(
        string $id,
        string $name,
        ?string $language = null,
        ?string $primaryLanguage = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['name'] = $name;

        null !== $language && $obj['language'] = $language;
        null !== $primaryLanguage && $obj['primaryLanguage'] = $primaryLanguage;

        return $obj;
    }

    /**
     * ID of the object to be cloned.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Name of newly cloned blog tag.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Target language of new variant.
     */
    public function withLanguage(string $language): self
    {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }

    /**
     * Language of primary blog tag to clone.
     */
    public function withPrimaryLanguage(string $primaryLanguage): self
    {
        $obj = clone $this;
        $obj['primaryLanguage'] = $primaryLanguage;

        return $obj;
    }
}
