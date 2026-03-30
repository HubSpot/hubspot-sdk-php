<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Settings;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get a specific blog revision.
 *
 * @see HubspotSDK\Services\Cms\Blogs\SettingsService::getRevision()
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
