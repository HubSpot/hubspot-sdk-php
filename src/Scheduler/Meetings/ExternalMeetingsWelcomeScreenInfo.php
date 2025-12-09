<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalMeetingsWelcomeScreenInfoShape = array{
 *   description?: string|null,
 *   logoURL?: string|null,
 *   showWelcomeScreen?: bool|null,
 *   title?: string|null,
 *   useCompanyLogo?: bool|null,
 * }
 */
final class ExternalMeetingsWelcomeScreenInfo implements BaseModel
{
    /** @use SdkModel<ExternalMeetingsWelcomeScreenInfoShape> */
    use SdkModel;

    #[Optional]
    public ?string $description;

    #[Optional('logoUrl')]
    public ?string $logoURL;

    #[Optional]
    public ?bool $showWelcomeScreen;

    #[Optional]
    public ?string $title;

    #[Optional]
    public ?bool $useCompanyLogo;

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
        ?string $description = null,
        ?string $logoURL = null,
        ?bool $showWelcomeScreen = null,
        ?string $title = null,
        ?bool $useCompanyLogo = null,
    ): self {
        $obj = new self;

        null !== $description && $obj['description'] = $description;
        null !== $logoURL && $obj['logoURL'] = $logoURL;
        null !== $showWelcomeScreen && $obj['showWelcomeScreen'] = $showWelcomeScreen;
        null !== $title && $obj['title'] = $title;
        null !== $useCompanyLogo && $obj['useCompanyLogo'] = $useCompanyLogo;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    public function withLogoURL(string $logoURL): self
    {
        $obj = clone $this;
        $obj['logoURL'] = $logoURL;

        return $obj;
    }

    public function withShowWelcomeScreen(bool $showWelcomeScreen): self
    {
        $obj = clone $this;
        $obj['showWelcomeScreen'] = $showWelcomeScreen;

        return $obj;
    }

    public function withTitle(string $title): self
    {
        $obj = clone $this;
        $obj['title'] = $title;

        return $obj;
    }

    public function withUseCompanyLogo(bool $useCompanyLogo): self
    {
        $obj = clone $this;
        $obj['useCompanyLogo'] = $useCompanyLogo;

        return $obj;
    }
}
