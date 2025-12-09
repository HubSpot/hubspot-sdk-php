<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\EmailCreateParams\Language;
use HubspotSDK\Marketing\Emails\EmailCreateParams\State;
use HubspotSDK\Marketing\Emails\EmailCreateParams\Subcategory;
use HubspotSDK\Marketing\Emails\PublicEmailTestingDetails\AbSampleSizeDefault;
use HubspotSDK\Marketing\Emails\PublicEmailTestingDetails\AbSamplingDefault;
use HubspotSDK\Marketing\Emails\PublicEmailTestingDetails\AbStatus;
use HubspotSDK\Marketing\Emails\PublicEmailTestingDetails\AbSuccessMetric;

/**
 * Use this endpoint to create a new marketing email.
 *
 * @see HubspotSDK\Services\Marketing\EmailsService::create()
 *
 * @phpstan-type EmailCreateParamsShape = array{
 *   name: string,
 *   activeDomain?: string,
 *   archived?: bool,
 *   businessUnitID?: int,
 *   campaign?: string,
 *   content?: PublicEmailContent|array{
 *     flexAreas?: array<string,mixed>|null,
 *     plainTextVersion?: string|null,
 *     smartFields?: array<string,mixed>|null,
 *     styleSettings?: PublicEmailStyleSettings|null,
 *     templatePath?: string|null,
 *     themeSettingsValues?: array<string,mixed>|null,
 *     widgetContainers?: array<string,mixed>|null,
 *     widgets?: array<string,mixed>|null,
 *   },
 *   feedbackSurveyID?: string,
 *   folderIDV2?: int,
 *   from?: PublicEmailFromDetails|array{
 *     customReplyTo?: string|null, fromName?: string|null, replyTo?: string|null
 *   },
 *   jitterSendTime?: bool,
 *   language?: Language|value-of<Language>,
 *   publishDate?: \DateTimeInterface,
 *   rssData?: PublicRssEmailDetails|array{
 *     blogEmailType?: string|null,
 *     blogImageMaxWidth?: int|null,
 *     blogLayout?: string|null,
 *     hubspotBlogID?: string|null,
 *     maxEntries?: int|null,
 *     rssEntryTemplate?: string|null,
 *     timing?: array<string,mixed>|null,
 *     url?: string|null,
 *     useHeadlineAsSubject?: bool|null,
 *   },
 *   sendOnPublish?: bool,
 *   state?: State|value-of<State>,
 *   subcategory?: Subcategory|value-of<Subcategory>,
 *   subject?: string,
 *   subscriptionDetails?: PublicEmailSubscriptionDetails|array{
 *     officeLocationID?: string|null,
 *     preferencesGroupID?: string|null,
 *     subscriptionID?: string|null,
 *     subscriptionName?: string|null,
 *   },
 *   testing?: PublicEmailTestingDetails|array{
 *     abSampleSizeDefault?: value-of<AbSampleSizeDefault>|null,
 *     abSamplingDefault?: value-of<AbSamplingDefault>|null,
 *     abStatus?: value-of<AbStatus>|null,
 *     abSuccessMetric?: value-of<AbSuccessMetric>|null,
 *     abTestPercentage?: int|null,
 *     hoursToWait?: int|null,
 *     isAbVariation?: bool|null,
 *     testID?: string|null,
 *   },
 *   to?: PublicEmailToDetails|array{
 *     contactIDs?: PublicEmailRecipients|null,
 *     contactIlsLists?: PublicEmailRecipients|null,
 *     contactLists?: PublicEmailRecipients|null,
 *     limitSendFrequency?: bool|null,
 *     suppressGraymail?: bool|null,
 *   },
 *   webversion?: PublicWebversionDetails|array{
 *     domain?: string|null,
 *     enabled?: bool|null,
 *     expiresAt?: \DateTimeInterface|null,
 *     isPageRedirected?: bool|null,
 *     metaDescription?: string|null,
 *     pageExpiryEnabled?: bool|null,
 *     redirectToPageID?: string|null,
 *     redirectToURL?: string|null,
 *     slug?: string|null,
 *     title?: string|null,
 *     url?: string|null,
 *   },
 * }
 */
final class EmailCreateParams implements BaseModel
{
    /** @use SdkModel<EmailCreateParamsShape> */
    use SdkModel;
    use SdkParams;

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
     * `new EmailCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailCreateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailCreateParams)->withName(...)
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
        $obj = new self;

        $obj['name'] = $name;

        null !== $activeDomain && $obj['activeDomain'] = $activeDomain;
        null !== $archived && $obj['archived'] = $archived;
        null !== $businessUnitID && $obj['businessUnitID'] = $businessUnitID;
        null !== $campaign && $obj['campaign'] = $campaign;
        null !== $content && $obj['content'] = $content;
        null !== $feedbackSurveyID && $obj['feedbackSurveyID'] = $feedbackSurveyID;
        null !== $folderIDV2 && $obj['folderIDV2'] = $folderIDV2;
        null !== $from && $obj['from'] = $from;
        null !== $jitterSendTime && $obj['jitterSendTime'] = $jitterSendTime;
        null !== $language && $obj['language'] = $language;
        null !== $publishDate && $obj['publishDate'] = $publishDate;
        null !== $rssData && $obj['rssData'] = $rssData;
        null !== $sendOnPublish && $obj['sendOnPublish'] = $sendOnPublish;
        null !== $state && $obj['state'] = $state;
        null !== $subcategory && $obj['subcategory'] = $subcategory;
        null !== $subject && $obj['subject'] = $subject;
        null !== $subscriptionDetails && $obj['subscriptionDetails'] = $subscriptionDetails;
        null !== $testing && $obj['testing'] = $testing;
        null !== $to && $obj['to'] = $to;
        null !== $webversion && $obj['webversion'] = $webversion;

        return $obj;
    }

    /**
     * The name of the email, as displayed on the email dashboard.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The active domain of the email.
     */
    public function withActiveDomain(string $activeDomain): self
    {
        $obj = clone $this;
        $obj['activeDomain'] = $activeDomain;

        return $obj;
    }

    /**
     * Determines if the email is archived or not.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }

    public function withBusinessUnitID(int $businessUnitID): self
    {
        $obj = clone $this;
        $obj['businessUnitID'] = $businessUnitID;

        return $obj;
    }

    /**
     * The ID of the campaign this email is associated to.
     */
    public function withCampaign(string $campaign): self
    {
        $obj = clone $this;
        $obj['campaign'] = $campaign;

        return $obj;
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
        $obj = clone $this;
        $obj['content'] = $content;

        return $obj;
    }

    /**
     * The ID of the feedback survey linked to the email.
     */
    public function withFeedbackSurveyID(string $feedbackSurveyID): self
    {
        $obj = clone $this;
        $obj['feedbackSurveyID'] = $feedbackSurveyID;

        return $obj;
    }

    public function withFolderIdv2(int $folderIDV2): self
    {
        $obj = clone $this;
        $obj['folderIDV2'] = $folderIDV2;

        return $obj;
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
        $obj = clone $this;
        $obj['from'] = $from;

        return $obj;
    }

    public function withJitterSendTime(bool $jitterSendTime): self
    {
        $obj = clone $this;
        $obj['jitterSendTime'] = $jitterSendTime;

        return $obj;
    }

    /**
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }

    /**
     * The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     */
    public function withPublishDate(\DateTimeInterface $publishDate): self
    {
        $obj = clone $this;
        $obj['publishDate'] = $publishDate;

        return $obj;
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
        $obj = clone $this;
        $obj['rssData'] = $rssData;

        return $obj;
    }

    /**
     * Determines whether the email will be sent immediately on publish.
     */
    public function withSendOnPublish(bool $sendOnPublish): self
    {
        $obj = clone $this;
        $obj['sendOnPublish'] = $sendOnPublish;

        return $obj;
    }

    /**
     * The email state.
     *
     * @param State|value-of<State> $state
     */
    public function withState(State|string $state): self
    {
        $obj = clone $this;
        $obj['state'] = $state;

        return $obj;
    }

    /**
     * The email subcategory.
     *
     * @param Subcategory|value-of<Subcategory> $subcategory
     */
    public function withSubcategory(Subcategory|string $subcategory): self
    {
        $obj = clone $this;
        $obj['subcategory'] = $subcategory;

        return $obj;
    }

    /**
     * The subject of the email.
     */
    public function withSubject(string $subject): self
    {
        $obj = clone $this;
        $obj['subject'] = $subject;

        return $obj;
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
        $obj = clone $this;
        $obj['subscriptionDetails'] = $subscriptionDetails;

        return $obj;
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
        $obj = clone $this;
        $obj['testing'] = $testing;

        return $obj;
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
        $obj = clone $this;
        $obj['to'] = $to;

        return $obj;
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
        $obj = clone $this;
        $obj['webversion'] = $webversion;

        return $obj;
    }
}
