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

    /**
     * A brief description displayed the welcome screen below the title.
     */
    #[Optional]
    public ?string $description;

    /**
     * The URL of the logo image to be displayed on the welcome screen, only used if `useCompanyLogo` is false.
     */
    #[Optional('logoUrl')]
    public ?string $logoURL;

    /**
     * Deprecated property. Value can be ignored but will always be false.
     */
    #[Optional]
    public ?bool $showWelcomeScreen;

    /**
     * The main heading displayed on the welcome screen.
     */
    #[Optional]
    public ?string $title;

    /**
     * Whether the company's logo should be displayed on the welcome screen.
     */
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
        $self = new self;

        null !== $description && $self['description'] = $description;
        null !== $logoURL && $self['logoURL'] = $logoURL;
        null !== $showWelcomeScreen && $self['showWelcomeScreen'] = $showWelcomeScreen;
        null !== $title && $self['title'] = $title;
        null !== $useCompanyLogo && $self['useCompanyLogo'] = $useCompanyLogo;

        return $self;
    }

    /**
     * A brief description displayed the welcome screen below the title.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * The URL of the logo image to be displayed on the welcome screen, only used if `useCompanyLogo` is false.
     */
    public function withLogoURL(string $logoURL): self
    {
        $self = clone $this;
        $self['logoURL'] = $logoURL;

        return $self;
    }

    /**
     * Deprecated property. Value can be ignored but will always be false.
     */
    public function withShowWelcomeScreen(bool $showWelcomeScreen): self
    {
        $self = clone $this;
        $self['showWelcomeScreen'] = $showWelcomeScreen;

        return $self;
    }

    /**
     * The main heading displayed on the welcome screen.
     */
    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }

    /**
     * Whether the company's logo should be displayed on the welcome screen.
     */
    public function withUseCompanyLogo(bool $useCompanyLogo): self
    {
        $self = clone $this;
        $self['useCompanyLogo'] = $useCompanyLogo;

        return $self;
    }
}
