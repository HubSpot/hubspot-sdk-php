<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Settings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Cms\Blogs\SettingsService::getRevision()
 *
 * @phpstan-type SettingGetRevisionParamsShape = array{blogId: string}
 */
final class SettingGetRevisionParams implements BaseModel
{
    /** @use SdkModel<SettingGetRevisionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $blogId;

    /**
     * `new SettingGetRevisionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SettingGetRevisionParams::with(blogId: ...)
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
    public static function with(string $blogId): self
    {
        $obj = new self;

        $obj->blogId = $blogId;

        return $obj;
    }

    public function withBlogID(string $blogID): self
    {
        $obj = clone $this;
        $obj->blogId = $blogID;

        return $obj;
    }
}
