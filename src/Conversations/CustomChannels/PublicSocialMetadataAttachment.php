<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Conversations\CustomChannels\PublicSocialMetadataAttachment\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SocialMetadataShape from \HubspotSDK\Conversations\CustomChannels\SocialMetadata
 *
 * @phpstan-type PublicSocialMetadataAttachmentShape = array{
 *   socialMetadata: SocialMetadata|SocialMetadataShape, type: Type|value-of<Type>
 * }
 */
final class PublicSocialMetadataAttachment implements BaseModel
{
    /** @use SdkModel<PublicSocialMetadataAttachmentShape> */
    use SdkModel;

    #[Required]
    public SocialMetadata $socialMetadata;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new PublicSocialMetadataAttachment()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicSocialMetadataAttachment::with(socialMetadata: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicSocialMetadataAttachment)->withSocialMetadata(...)->withType(...)
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
