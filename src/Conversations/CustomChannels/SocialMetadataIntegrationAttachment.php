<?php

declare(strict_types=1);

namespace HubSpotSDK\Conversations\CustomChannels;

use HubSpotSDK\Conversations\CustomChannels\SocialMetadataIntegrationAttachment\Type;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SocialMetadataShape from \HubSpotSDK\Conversations\CustomChannels\SocialMetadata
 *
 * @phpstan-type SocialMetadataIntegrationAttachmentShape = array{
 *   socialMetadata: SocialMetadata|SocialMetadataShape, type: Type|value-of<Type>
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
     * @param SocialMetadata|SocialMetadataShape $socialMetadata
     * @param Type|value-of<Type> $type
     */
    public static function with(
        SocialMetadata|array $socialMetadata,
        Type|string $type = 'SOCIAL_MEDIA_METADATA',
    ): self {
        $self = new self;

        $self['socialMetadata'] = $socialMetadata;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param SocialMetadata|SocialMetadataShape $socialMetadata
     */
    public function withSocialMetadata(
        SocialMetadata|array $socialMetadata
    ): self {
        $self = clone $this;
        $self['socialMetadata'] = $socialMetadata;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
