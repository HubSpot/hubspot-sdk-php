<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Explicitly set new languages for each post in a [multi-language group](https://developers.hubspot.com/docs/guides/cms/content/multi-language-content).
 *
 * @see HubspotSDK\Cms\Blogs\Posts->updateLangs
 *
 * @phpstan-type post_update_langs_params = array{
 *   languages: array<string, string>, primaryID: string
 * }
 */
final class PostUpdateLangsParams implements BaseModel
{
    /** @use SdkModel<post_update_langs_params> */
    use SdkModel;
    use SdkParams;

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
     * `new PostUpdateLangsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PostUpdateLangsParams::with(languages: ..., primaryID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PostUpdateLangsParams)->withLanguages(...)->withPrimaryID(...)
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
