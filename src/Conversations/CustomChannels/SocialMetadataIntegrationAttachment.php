<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Conversations\CustomChannels\SocialMetadataIntegrationAttachment\Type;
use HubspotSDK\Conversations\SocialMetadata;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SocialMetadataIntegrationAttachmentShape = array{
 *   socialMetadata: SocialMetadata, type: value-of<Type>
 * }
 */
final class SocialMetadataIntegrationAttachment implements BaseModel
{
    /** @use SdkModel<SocialMetadataIntegrationAttachmentShape> */
    use SdkModel;

    #[Required]
    public SocialMetadata $socialMetadata;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new SocialMetadataIntegrationAttachment()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SocialMetadataIntegrationAttachment::with(socialMetadata: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SocialMetadataIntegrationAttachment)
     *   ->withSocialMetadata(...)
     *   ->withType(...)
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
     * @param SocialMetadata|array{
     *   mediaType: string,
     *   id?: string|null,
     *   description?: string|null,
     *   mediaTitle?: string|null,
     *   mediaURL?: string|null,
     *   mediaURLString?: string|null,
     *   thumbnailURL?: string|null,
     * } $socialMetadata
     * @param Type|value-of<Type> $type
     */
    public static function with(
        SocialMetadata|array $socialMetadata,
        Type|string $type = 'SOCIAL_MEDIA_METADATA',
    ): self {
        $obj = new self;

        $obj['socialMetadata'] = $socialMetadata;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * @param SocialMetadata|array{
     *   mediaType: string,
     *   id?: string|null,
     *   description?: string|null,
     *   mediaTitle?: string|null,
     *   mediaURL?: string|null,
     *   mediaURLString?: string|null,
     *   thumbnailURL?: string|null,
     * } $socialMetadata
     */
    public function withSocialMetadata(
        SocialMetadata|array $socialMetadata
    ): self {
        $obj = clone $this;
        $obj['socialMetadata'] = $socialMetadata;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
