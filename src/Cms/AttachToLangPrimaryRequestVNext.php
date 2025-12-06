<?php

declare(strict_types=1);

namespace HubspotSDK\Cms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Request body object for attaching objects to multi-language groups.
 *
 * @phpstan-type AttachToLangPrimaryRequestVNextShape = array{
 *   id: string, language: string, primaryId: string, primaryLanguage?: string|null
 * }
 */
final class AttachToLangPrimaryRequestVNext implements BaseModel
{
    /** @use SdkModel<AttachToLangPrimaryRequestVNextShape> */
    use SdkModel;

    /**
     * ID of the object to add to a multi-language group.
     */
    #[Api]
    public string $id;

    /**
     * Designated language of the object to add to a multi-language group.
     */
    #[Api]
    public string $language;

    /**
     * ID of primary language object in multi-language group.
     */
    #[Api]
    public string $primaryId;

    /**
     * Primary language of the multi-language group.
     */
    #[Api(optional: true)]
    public ?string $primaryLanguage;

    /**
     * `new AttachToLangPrimaryRequestVNext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AttachToLangPrimaryRequestVNext::with(id: ..., language: ..., primaryId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AttachToLangPrimaryRequestVNext)
     *   ->withID(...)
     *   ->withLanguage(...)
     *   ->withPrimaryID(...)
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
        string $language,
        string $primaryId,
        ?string $primaryLanguage = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['language'] = $language;
        $obj['primaryId'] = $primaryId;

        null !== $primaryLanguage && $obj['primaryLanguage'] = $primaryLanguage;

        return $obj;
    }

    /**
     * ID of the object to add to a multi-language group.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Designated language of the object to add to a multi-language group.
     */
    public function withLanguage(string $language): self
    {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }

    /**
     * ID of primary language object in multi-language group.
     */
    public function withPrimaryID(string $primaryID): self
    {
        $obj = clone $this;
        $obj['primaryId'] = $primaryID;

        return $obj;
    }

    /**
     * Primary language of the multi-language group.
     */
    public function withPrimaryLanguage(string $primaryLanguage): self
    {
        $obj = clone $this;
        $obj['primaryLanguage'] = $primaryLanguage;

        return $obj;
    }
}
