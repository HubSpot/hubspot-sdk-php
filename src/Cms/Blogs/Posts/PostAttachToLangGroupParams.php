<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Cms\Blogs\Posts\PostAttachToLangGroupParams\Language;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new PostAttachToLangGroupParams); // set properties as needed
 * $client->cms.blogs.posts->attachToLangGroup(...$params->toArray());
 * ```
 * Attach post to a multi-language group.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.blogs.posts->attachToLangGroup(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Blogs\Posts->attachToLangGroup
 *
 * @phpstan-type post_attach_to_lang_group_params = array{
 *   id: string,
 *   language: Language|value-of<Language>,
 *   primaryID: string,
 *   primaryLanguage?: string,
 * }
 */
final class PostAttachToLangGroupParams implements BaseModel
{
    /** @use SdkModel<post_attach_to_lang_group_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $id;

    /** @var value-of<Language> $language */
    #[Api(enum: Language::class)]
    public string $language;

    #[Api('primaryId')]
    public string $primaryID;

    #[Api(optional: true)]
    public ?string $primaryLanguage;

    /**
     * `new PostAttachToLangGroupParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PostAttachToLangGroupParams::with(id: ..., language: ..., primaryID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PostAttachToLangGroupParams)
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
     *
     * @param Language|value-of<Language> $language
     */
    public static function with(
        string $id,
        Language|string $language,
        string $primaryID,
        ?string $primaryLanguage = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj['language'] = $language;
        $obj->primaryID = $primaryID;

        null !== $primaryLanguage && $obj->primaryLanguage = $primaryLanguage;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }

    public function withPrimaryID(string $primaryID): self
    {
        $obj = clone $this;
        $obj->primaryID = $primaryID;

        return $obj;
    }

    public function withPrimaryLanguage(string $primaryLanguage): self
    {
        $obj = clone $this;
        $obj->primaryLanguage = $primaryLanguage;

        return $obj;
    }
}
