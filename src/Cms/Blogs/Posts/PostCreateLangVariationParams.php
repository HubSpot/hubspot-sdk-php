<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new PostCreateLangVariationParams); // set properties as needed
 * $client->cms.blogs.posts->createLangVariation(...$params->toArray());
 * ```
 * Create a language variation.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.blogs.posts->createLangVariation(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Blogs\Posts->createLangVariation
 *
 * @phpstan-type post_create_lang_variation_params = array{
 *   id: string, language?: string
 * }
 */
final class PostCreateLangVariationParams implements BaseModel
{
    /** @use SdkModel<post_create_lang_variation_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $id;

    #[Api(optional: true)]
    public ?string $language;

    /**
     * `new PostCreateLangVariationParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PostCreateLangVariationParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PostCreateLangVariationParams)->withID(...)
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
    public static function with(string $id, ?string $language = null): self
    {
        $obj = new self;

        $obj->id = $id;

        null !== $language && $obj->language = $language;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withLanguage(string $language): self
    {
        $obj = clone $this;
        $obj->language = $language;

        return $obj;
    }
}
