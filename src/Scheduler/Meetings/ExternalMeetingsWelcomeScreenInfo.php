<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type external_meetings_welcome_screen_info = array{
 *   logoURL?: string,
 *   showWelcomeScreen?: bool,
 *   title?: string,
 *   useCompanyLogo?: bool,
 * }
 */
final class ExternalMeetingsWelcomeScreenInfo implements BaseModel
{
    /** @use SdkModel<external_meetings_welcome_screen_info> */
    use SdkModel;

    #[Api('logoUrl', optional: true)]
    public ?string $logoURL;

    #[Api(optional: true)]
    public ?bool $showWelcomeScreen;

    #[Api(optional: true)]
    public ?string $title;

    #[Api(optional: true)]
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
        ?string $logoURL = null,
        ?bool $showWelcomeScreen = null,
        ?string $title = null,
        ?bool $useCompanyLogo = null,
    ): self {
        $obj = new self;

        null !== $logoURL && $obj->logoURL = $logoURL;
        null !== $showWelcomeScreen && $obj->showWelcomeScreen = $showWelcomeScreen;
        null !== $title && $obj->title = $title;
        null !== $useCompanyLogo && $obj->useCompanyLogo = $useCompanyLogo;

        return $obj;
    }

    public function withLogoURL(string $logoURL): self
    {
        $obj = clone $this;
        $obj->logoURL = $logoURL;

        return $obj;
    }

    public function withShowWelcomeScreen(bool $showWelcomeScreen): self
    {
        $obj = clone $this;
        $obj->showWelcomeScreen = $showWelcomeScreen;

        return $obj;
    }

    public function withTitle(string $title): self
    {
        $obj = clone $this;
        $obj->title = $title;

        return $obj;
    }

    public function withUseCompanyLogo(bool $useCompanyLogo): self
    {
        $obj = clone $this;
        $obj->useCompanyLogo = $useCompanyLogo;

        return $obj;
    }
}
