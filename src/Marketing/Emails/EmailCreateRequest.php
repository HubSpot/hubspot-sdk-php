<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\EmailCreateRequest\Language;
use HubspotSDK\Marketing\Emails\EmailCreateRequest\State;
use HubspotSDK\Marketing\Emails\EmailCreateRequest\Subcategory;
use HubspotSDK\Marketing\Emails\PublicEmailTestingDetails\AbSampleSizeDefault;
use HubspotSDK\Marketing\Emails\PublicEmailTestingDetails\AbSamplingDefault;
use HubspotSDK\Marketing\Emails\PublicEmailTestingDetails\AbStatus;
use HubspotSDK\Marketing\Emails\PublicEmailTestingDetails\AbSuccessMetric;

/**
 * Properties of a marketing email you can set when creating a marketing email.
 *
 * @phpstan-type EmailCreateRequestShape = array{
 *   name: string,
 *   activeDomain?: string|null,
 *   archived?: bool|null,
 *   businessUnitID?: int|null,
 *   campaign?: string|null,
 *   content?: PublicEmailContent|null,
 *   feedbackSurveyID?: string|null,
 *   folderIDV2?: int|null,
 *   from?: PublicEmailFromDetails|null,
 *   jitterSendTime?: bool|null,
 *   language?: value-of<Language>|null,
 *   publishDate?: \DateTimeInterface|null,
 *   rssData?: PublicRssEmailDetails|null,
 *   sendOnPublish?: bool|null,
 *   state?: value-of<State>|null,
 *   subcategory?: value-of<Subcategory>|null,
 *   subject?: string|null,
 *   subscriptionDetails?: PublicEmailSubscriptionDetails|null,
 *   testing?: PublicEmailTestingDetails|null,
 *   to?: PublicEmailToDetails|null,
 *   webversion?: PublicWebversionDetails|null,
 * }
 */
final class EmailCreateRequest implements BaseModel
{
    /** @use SdkModel<EmailCreateRequestShape> */
    use SdkModel;

    /**
     * The name of the email, as displayed on the email dashboard.
     */
    #[Required]
    public string $name;

    /**
     * The active domain of the email.
     */
    #[Optional]
    public ?string $activeDomain;

    /**
     * Determines if the email is archived or not.
     */
    #[Optional]
    public ?bool $archived;

    #[Optional('businessUnitId')]
    public ?int $businessUnitID;

    /**
     * The ID of the campaign this email is associated to.
     */
    #[Optional]
    public ?string $campaign;

    /**
     * Data structure representing the content of the email.
     */
    #[Optional]
    public ?PublicEmailContent $content;

    /**
     * The ID of the feedback survey linked to the email.
     */
    #[Optional('feedbackSurveyId')]
    public ?string $feedbackSurveyID;

    #[Optional('folderIdV2')]
    public ?int $folderIDV2;

    /**
     * Data structure representing the from fields on the email.
     */
    #[Optional]
    public ?PublicEmailFromDetails $from;

    #[Optional]
    public ?bool $jitterSendTime;

    /** @var value-of<Language>|null $language */
    #[Optional(enum: Language::class)]
    public ?string $language;

    /**
     * The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     */
    #[Optional]
    public ?\DateTimeInterface $publishDate;

    /**
     * RSS related data if it is a blog or rss email.
     */
    #[Optional]
    public ?PublicRssEmailDetails $rssData;

    /**
     * Determines whether the email will be sent immediately on publish.
     */
    #[Optional]
    public ?bool $sendOnPublish;

    /**
     * The email state.
     *
     * @var value-of<State>|null $state
     */
    #[Optional(enum: State::class)]
    public ?string $state;

    /**
     * The email subcategory.
     *
     * @var value-of<Subcategory>|null $subcategory
     */
    #[Optional(enum: Subcategory::class)]
    public ?string $subcategory;

    /**
     * The subject of the email.
     */
    #[Optional]
    public ?string $subject;

    /**
     * Data structure representing the subscription fields of the email.
     */
    #[Optional]
    public ?PublicEmailSubscriptionDetails $subscriptionDetails;

    /**
     * AB testing related data. This property is only returned for AB type emails.
     */
    #[Optional]
    public ?PublicEmailTestingDetails $testing;

    /**
     * Data structure representing the to fields of the email.
     */
    #[Optional]
    public ?PublicEmailToDetails $to;

    #[Optional]
    public ?PublicWebversionDetails $webversion;

    /**
     * `new EmailCreateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailCreateRequest::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailCreateRequest)->withName(...)
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
     * @param PublicEmailContent|array{
     *   flexAreas?: array<string,mixed>|null,
     *   plainTextVersion?: string|null,
     *   smartFields?: array<string,mixed>|null,
     *   styleSettings?: PublicEmailStyleSettings|null,
     *   templatePath?: string|null,
     *   themeSettingsValues?: array<string,mixed>|null,
     *   widgetContainers?: array<string,mixed>|null,
     *   widgets?: array<string,mixed>|null,
     * } $content
     * @param PublicEmailFromDetails|array{
     *   customReplyTo?: string|null, fromName?: string|null, replyTo?: string|null
     * } $from
     * @param Language|value-of<Language> $language
     * @param PublicRssEmailDetails|array{
     *   blogEmailType?: string|null,
     *   blogImageMaxWidth?: int|null,
     *   blogLayout?: string|null,
     *   hubspotBlogID?: string|null,
     *   maxEntries?: int|null,
     *   rssEntryTemplate?: string|null,
     *   timing?: array<string,mixed>|null,
     *   url?: string|null,
     *   useHeadlineAsSubject?: bool|null,
     * } $rssData
     * @param State|value-of<State> $state
     * @param Subcategory|value-of<Subcategory> $subcategory
     * @param PublicEmailSubscriptionDetails|array{
     *   officeLocationID?: string|null,
     *   preferencesGroupID?: string|null,
     *   subscriptionID?: string|null,
     *   subscriptionName?: string|null,
     * } $subscriptionDetails
     * @param PublicEmailTestingDetails|array{
     *   abSampleSizeDefault?: value-of<AbSampleSizeDefault>|null,
     *   abSamplingDefault?: value-of<AbSamplingDefault>|null,
     *   abStatus?: value-of<AbStatus>|null,
     *   abSuccessMetric?: value-of<AbSuccessMetric>|null,
     *   abTestPercentage?: int|null,
     *   hoursToWait?: int|null,
     *   isAbVariation?: bool|null,
     *   testID?: string|null,
     * } $testing
     * @param PublicEmailToDetails|array{
     *   contactIDs?: PublicEmailRecipients|null,
     *   contactIlsLists?: PublicEmailRecipients|null,
     *   contactLists?: PublicEmailRecipients|null,
     *   limitSendFrequency?: bool|null,
     *   suppressGraymail?: bool|null,
     * } $to
     * @param PublicWebversionDetails|array{
     *   domain?: string|null,
     *   enabled?: bool|null,
     *   expiresAt?: \DateTimeInterface|null,
     *   isPageRedirected?: bool|null,
     *   metaDescription?: string|null,
     *   pageExpiryEnabled?: bool|null,
     *   redirectToPageID?: string|null,
     *   redirectToURL?: string|null,
     *   slug?: string|null,
     *   title?: string|null,
     *   url?: string|null,
     * } $webversion
     */
    public static function with(
        string $name,
        ?string $activeDomain = null,
        ?bool $archived = null,
        ?int $businessUnitID = null,
        ?string $campaign = null,
        PublicEmailContent|array|null $content = null,
        ?string $feedbackSurveyID = null,
        ?int $folderIDV2 = null,
        PublicEmailFromDetails|array|null $from = null,
        ?bool $jitterSendTime = null,
        Language|string|null $language = null,
        ?\DateTimeInterface $publishDate = null,
        PublicRssEmailDetails|array|null $rssData = null,
        ?bool $sendOnPublish = null,
        State|string|null $state = null,
        Subcategory|string|null $subcategory = null,
        ?string $subject = null,
        PublicEmailSubscriptionDetails|array|null $subscriptionDetails = null,
        PublicEmailTestingDetails|array|null $testing = null,
        PublicEmailToDetails|array|null $to = null,
        PublicWebversionDetails|array|null $webversion = null,
    ): self {
        $self = new self;

        $self['name'] = $name;

        null !== $activeDomain && $self['activeDomain'] = $activeDomain;
        null !== $archived && $self['archived'] = $archived;
        null !== $businessUnitID && $self['businessUnitID'] = $businessUnitID;
        null !== $campaign && $self['campaign'] = $campaign;
        null !== $content && $self['content'] = $content;
        null !== $feedbackSurveyID && $self['feedbackSurveyID'] = $feedbackSurveyID;
        null !== $folderIDV2 && $self['folderIDV2'] = $folderIDV2;
        null !== $from && $self['from'] = $from;
        null !== $jitterSendTime && $self['jitterSendTime'] = $jitterSendTime;
        null !== $language && $self['language'] = $language;
        null !== $publishDate && $self['publishDate'] = $publishDate;
        null !== $rssData && $self['rssData'] = $rssData;
        null !== $sendOnPublish && $self['sendOnPublish'] = $sendOnPublish;
        null !== $state && $self['state'] = $state;
        null !== $subcategory && $self['subcategory'] = $subcategory;
        null !== $subject && $self['subject'] = $subject;
        null !== $subscriptionDetails && $self['subscriptionDetails'] = $subscriptionDetails;
        null !== $testing && $self['testing'] = $testing;
        null !== $to && $self['to'] = $to;
        null !== $webversion && $self['webversion'] = $webversion;

        return $self;
    }

    /**
     * The name of the email, as displayed on the email dashboard.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The active domain of the email.
     */
    public function withActiveDomain(string $activeDomain): self
    {
        $self = clone $this;
        $self['activeDomain'] = $activeDomain;

        return $self;
    }

    /**
     * Determines if the email is archived or not.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    public function withBusinessUnitID(int $businessUnitID): self
    {
        $self = clone $this;
        $self['businessUnitID'] = $businessUnitID;

        return $self;
    }

    /**
     * The ID of the campaign this email is associated to.
     */
    public function withCampaign(string $campaign): self
    {
        $self = clone $this;
        $self['campaign'] = $campaign;

        return $self;
    }

    /**
     * Data structure representing the content of the email.
     *
     * @param PublicEmailContent|array{
     *   flexAreas?: array<string,mixed>|null,
     *   plainTextVersion?: string|null,
     *   smartFields?: array<string,mixed>|null,
     *   styleSettings?: PublicEmailStyleSettings|null,
     *   templatePath?: string|null,
     *   themeSettingsValues?: array<string,mixed>|null,
     *   widgetContainers?: array<string,mixed>|null,
     *   widgets?: array<string,mixed>|null,
     * } $content
     */
    public function withContent(PublicEmailContent|array $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    /**
     * The ID of the feedback survey linked to the email.
     */
    public function withFeedbackSurveyID(string $feedbackSurveyID): self
    {
        $self = clone $this;
        $self['feedbackSurveyID'] = $feedbackSurveyID;

        return $self;
    }

    public function withFolderIdv2(int $folderIDV2): self
    {
        $self = clone $this;
        $self['folderIDV2'] = $folderIDV2;

        return $self;
    }

    /**
     * Data structure representing the from fields on the email.
     *
     * @param PublicEmailFromDetails|array{
     *   customReplyTo?: string|null, fromName?: string|null, replyTo?: string|null
     * } $from
     */
    public function withFrom(PublicEmailFromDetails|array $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    public function withJitterSendTime(bool $jitterSendTime): self
    {
        $self = clone $this;
        $self['jitterSendTime'] = $jitterSendTime;

        return $self;
    }

    /**
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     */
    public function withPublishDate(\DateTimeInterface $publishDate): self
    {
        $self = clone $this;
        $self['publishDate'] = $publishDate;

        return $self;
    }

    /**
     * RSS related data if it is a blog or rss email.
     *
     * @param PublicRssEmailDetails|array{
     *   blogEmailType?: string|null,
     *   blogImageMaxWidth?: int|null,
     *   blogLayout?: string|null,
     *   hubspotBlogID?: string|null,
     *   maxEntries?: int|null,
     *   rssEntryTemplate?: string|null,
     *   timing?: array<string,mixed>|null,
     *   url?: string|null,
     *   useHeadlineAsSubject?: bool|null,
     * } $rssData
     */
    public function withRssData(PublicRssEmailDetails|array $rssData): self
    {
        $self = clone $this;
        $self['rssData'] = $rssData;

        return $self;
    }

    /**
     * Determines whether the email will be sent immediately on publish.
     */
    public function withSendOnPublish(bool $sendOnPublish): self
    {
        $self = clone $this;
        $self['sendOnPublish'] = $sendOnPublish;

        return $self;
    }

    /**
     * The email state.
     *
     * @param State|value-of<State> $state
     */
    public function withState(State|string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    /**
     * The email subcategory.
     *
     * @param Subcategory|value-of<Subcategory> $subcategory
     */
    public function withSubcategory(Subcategory|string $subcategory): self
    {
        $self = clone $this;
        $self['subcategory'] = $subcategory;

        return $self;
    }

    /**
     * The subject of the email.
     */
    public function withSubject(string $subject): self
    {
        $self = clone $this;
        $self['subject'] = $subject;

        return $self;
    }

    /**
     * Data structure representing the subscription fields of the email.
     *
     * @param PublicEmailSubscriptionDetails|array{
     *   officeLocationID?: string|null,
     *   preferencesGroupID?: string|null,
     *   subscriptionID?: string|null,
     *   subscriptionName?: string|null,
     * } $subscriptionDetails
     */
    public function withSubscriptionDetails(
        PublicEmailSubscriptionDetails|array $subscriptionDetails
    ): self {
        $self = clone $this;
        $self['subscriptionDetails'] = $subscriptionDetails;

        return $self;
    }

    /**
     * AB testing related data. This property is only returned for AB type emails.
     *
     * @param PublicEmailTestingDetails|array{
     *   abSampleSizeDefault?: value-of<AbSampleSizeDefault>|null,
     *   abSamplingDefault?: value-of<AbSamplingDefault>|null,
     *   abStatus?: value-of<AbStatus>|null,
     *   abSuccessMetric?: value-of<AbSuccessMetric>|null,
     *   abTestPercentage?: int|null,
     *   hoursToWait?: int|null,
     *   isAbVariation?: bool|null,
     *   testID?: string|null,
     * } $testing
     */
    public function withTesting(PublicEmailTestingDetails|array $testing): self
    {
        $self = clone $this;
        $self['testing'] = $testing;

        return $self;
    }

    /**
     * Data structure representing the to fields of the email.
     *
     * @param PublicEmailToDetails|array{
     *   contactIDs?: PublicEmailRecipients|null,
     *   contactIlsLists?: PublicEmailRecipients|null,
     *   contactLists?: PublicEmailRecipients|null,
     *   limitSendFrequency?: bool|null,
     *   suppressGraymail?: bool|null,
     * } $to
     */
    public function withTo(PublicEmailToDetails|array $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * @param PublicWebversionDetails|array{
     *   domain?: string|null,
     *   enabled?: bool|null,
     *   expiresAt?: \DateTimeInterface|null,
     *   isPageRedirected?: bool|null,
     *   metaDescription?: string|null,
     *   pageExpiryEnabled?: bool|null,
     *   redirectToPageID?: string|null,
     *   redirectToURL?: string|null,
     *   slug?: string|null,
     *   title?: string|null,
     *   url?: string|null,
     * } $webversion
     */
    public function withWebversion(
        PublicWebversionDetails|array $webversion
    ): self {
        $self = clone $this;
        $self['webversion'] = $webversion;

        return $self;
    }
}
