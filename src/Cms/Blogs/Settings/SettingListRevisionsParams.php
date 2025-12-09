<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Settings;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Cms\Blogs\SettingsService::listRevisions()
 *
 * @phpstan-type SettingListRevisionsParamsShape = array{
 *   after?: string, before?: string, limit?: int
 * }
 */
final class SettingListRevisionsParams implements BaseModel
{
    /** @use SdkModel<SettingListRevisionsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $after;

    #[Optional]
    public ?string $before;

    #[Optional]
    public ?int $limit;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $after = null,
        ?string $before = null,
        ?int $limit = null
    ): self {
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $before && $self['before'] = $before;
        null !== $limit && $self['limit'] = $limit;

        return $self;
    }

    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    public function withBefore(string $before): self
    {
        $self = clone $this;
        $self['before'] = $before;

        return $self;
    }

    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }
}
