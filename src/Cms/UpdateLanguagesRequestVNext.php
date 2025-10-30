<?php

declare(strict_types=1);

namespace HubspotSDK\Cms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Request object for updating languages within a multi-language group.
 *
 * @phpstan-type UpdateLanguagesRequestVNextShape = array{
 *   languages: array<string, string>, primaryID: string
 * }
 */
final class UpdateLanguagesRequestVNext implements BaseModel
{
    /** @use SdkModel<UpdateLanguagesRequestVNextShape> */
    use SdkModel;

    /**
     * Map of object IDs to associated languages of object in the multi-language group.
     *
     * @var array<string, string> $languages
     */
    #[Api(map: 'string')]
    public array $languages;

    /**
     * ID of the primary object in the multi-language group.
     */
    #[Api('primaryId')]
    public string $primaryID;

    /**
     * `new UpdateLanguagesRequestVNext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UpdateLanguagesRequestVNext::with(languages: ..., primaryID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UpdateLanguagesRequestVNext)->withLanguages(...)->withPrimaryID(...)
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
     *
     * @param array<string, string> $languages
     */
    public static function with(array $languages, string $primaryID): self
    {
        $obj = new self;

        $obj->languages = $languages;
        $obj->primaryID = $primaryID;

        return $obj;
    }

    /**
     * Map of object IDs to associated languages of object in the multi-language group.
     *
     * @param array<string, string> $languages
     */
    public function withLanguages(array $languages): self
    {
        $obj = clone $this;
        $obj->languages = $languages;

        return $obj;
    }

    /**
     * ID of the primary object in the multi-language group.
     */
    public function withPrimaryID(string $primaryID): self
    {
        $obj = clone $this;
        $obj->primaryID = $primaryID;

        return $obj;
    }
}
