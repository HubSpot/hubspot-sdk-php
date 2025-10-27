<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicSocialMetadataAttachment\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_social_metadata_attachment = array{
 *   socialMetadata: SocialMetadata, type: value-of<Type>
 * }
 */
final class PublicSocialMetadataAttachment implements BaseModel
{
    /** @use SdkModel<public_social_metadata_attachment> */
    use SdkModel;

    #[Api]
    public SocialMetadata $socialMetadata;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        SocialMetadata $socialMetadata,
        Type|string $type = 'SOCIAL_MEDIA_METADATA'
    ): self {
        $obj = new self;

        $obj->socialMetadata = $socialMetadata;
        $obj['type'] = $type;

        return $obj;
    }

    public function withSocialMetadata(SocialMetadata $socialMetadata): self
    {
        $obj = clone $this;
        $obj->socialMetadata = $socialMetadata;

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
