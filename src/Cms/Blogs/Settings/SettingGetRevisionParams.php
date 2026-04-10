<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Blogs\Settings;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Get a specific blog revision.
 *
 * @see HubSpotSDK\Services\Cms\Blogs\SettingsService::getRevision()
 *
 * @phpstan-type SettingGetRevisionParamsShape = array{blogID: string}
 */
final class SettingGetRevisionParams implements BaseModel
{
    /** @use SdkModel<SettingGetRevisionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $blogID;

    /**
     * `new SettingGetRevisionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SettingGetRevisionParams::with(blogID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SettingGetRevisionParams)->withBlogID(...)
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
    public static function with(string $blogID): self
    {
        $self = new self;

        $self['blogID'] = $blogID;

        return $self;
    }

    public function withBlogID(string $blogID): self
    {
        $self = clone $this;
        $self['blogID'] = $blogID;

        return $self;
    }
}
