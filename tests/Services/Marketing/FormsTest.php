<?php

namespace Tests\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Marketing\Forms\DependentField;
use HubspotSDK\Marketing\Forms\DependentFieldFilter;
use HubspotSDK\Marketing\Forms\EmailField;
use HubspotSDK\Marketing\Forms\EmailFieldValidation;
use HubspotSDK\Marketing\Forms\FieldGroup;
use HubspotSDK\Marketing\Forms\FormDisplayOptions;
use HubspotSDK\Marketing\Forms\FormPostSubmitAction;
use HubspotSDK\Marketing\Forms\FormStyle;
use HubspotSDK\Marketing\Forms\HubSpotFormConfiguration;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsNone;
use HubspotSDK\Marketing\Forms\LifecycleStage;
use HubspotSDK\Marketing\Forms\PhoneField;
use HubspotSDK\Marketing\Forms\PhoneFieldValidation;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class FormsTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(
            STAINLESS_FIXME_accessToken: 'pat-na1-xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx',
            baseUrl: $testUrl,
        );

        $this->client = $client;
    }

    #[Test]
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->forms->create((object) []);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->forms->create((object) []);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->forms->update('formId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->forms->list();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->forms->delete('formId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRead(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->forms->read('formId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testReplace(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->forms->replace(
            'formId',
            id: 'id',
            archived: true,
            configuration: HubSpotFormConfiguration::with(
                allowLinkToResetKnownValues: true,
                archivable: true,
                cloneable: true,
                createNewContactForNewEmail: true,
                editable: true,
                language: 'af',
                notifyContactOwner: true,
                notifyRecipients: ['string'],
                postSubmitAction: FormPostSubmitAction::with(
                    type: 'thank_you',
                    value: 'value'
                ),
                prePopulateKnownValues: true,
                recaptchaEnabled: true,
            ),
            createdAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            displayOptions: FormDisplayOptions::with(
                renderRawHTML: true,
                style: FormStyle::with(
                    backgroundWidth: 'backgroundWidth',
                    fontFamily: 'fontFamily',
                    helpTextColor: 'helpTextColor',
                    helpTextSize: 'helpTextSize',
                    labelTextColor: 'labelTextColor',
                    labelTextSize: 'labelTextSize',
                    legalConsentTextColor: 'legalConsentTextColor',
                    legalConsentTextSize: 'legalConsentTextSize',
                    submitAlignment: 'left',
                    submitColor: 'submitColor',
                    submitFontColor: 'submitFontColor',
                    submitSize: 'submitSize',
                ),
                submitButtonText: 'submitButtonText',
                theme: 'default_style',
            ),
            fieldGroups: [
                FieldGroup::with(
                    fields: [
                        EmailField::with(
                            dependentFields: [
                                DependentField::with(
                                    dependentCondition: DependentFieldFilter::with(
                                        operator: 'eq',
                                        rangeEnd: 'rangeEnd',
                                        rangeStart: 'rangeStart',
                                        value: 'value',
                                        values: ['string'],
                                    ),
                                    dependentField: PhoneField::with(
                                        dependentFields: [],
                                        fieldType: 'phone',
                                        hidden: true,
                                        label: 'label',
                                        name: 'name',
                                        objectTypeID: 'objectTypeId',
                                        required: true,
                                        useCountryCodeSelect: true,
                                        validation: PhoneFieldValidation::with(
                                            maxAllowedDigits: 0,
                                            minAllowedDigits: 0
                                        ),
                                    ),
                                ),
                            ],
                            fieldType: 'email',
                            hidden: true,
                            label: 'label',
                            name: 'name',
                            objectTypeID: 'objectTypeId',
                            required: true,
                            validation: EmailFieldValidation::with(
                                blockedEmailDomains: ['string'],
                                useDefaultBlockList: true
                            ),
                        ),
                    ],
                    groupType: 'default_group',
                    richTextType: 'text',
                ),
            ],
            formType: 'hubspot',
            legalConsentOptions: LegalConsentOptionsNone::with(type: 'none'),
            name: 'name',
            updatedAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testReplaceWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->forms->replace(
            'formId',
            id: 'id',
            archived: true,
            configuration: HubSpotFormConfiguration::with(
                allowLinkToResetKnownValues: true,
                archivable: true,
                cloneable: true,
                createNewContactForNewEmail: true,
                editable: true,
                language: 'af',
                notifyContactOwner: true,
                notifyRecipients: ['string'],
                postSubmitAction: FormPostSubmitAction::with(
                    type: 'thank_you',
                    value: 'value'
                ),
                prePopulateKnownValues: true,
                recaptchaEnabled: true,
            )
                ->withLifecycleStages(
                    [LifecycleStage::with(objectTypeID: 'objectTypeId', value: 'value')]
                ),
            createdAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            displayOptions: FormDisplayOptions::with(
                renderRawHTML: true,
                style: FormStyle::with(
                    backgroundWidth: 'backgroundWidth',
                    fontFamily: 'fontFamily',
                    helpTextColor: 'helpTextColor',
                    helpTextSize: 'helpTextSize',
                    labelTextColor: 'labelTextColor',
                    labelTextSize: 'labelTextSize',
                    legalConsentTextColor: 'legalConsentTextColor',
                    legalConsentTextSize: 'legalConsentTextSize',
                    submitAlignment: 'left',
                    submitColor: 'submitColor',
                    submitFontColor: 'submitFontColor',
                    submitSize: 'submitSize',
                ),
                submitButtonText: 'submitButtonText',
                theme: 'default_style',
            )
                ->withCssClass('cssClass'),
            fieldGroups: [
                FieldGroup::with(
                    fields: [
                        EmailField::with(
                            dependentFields: [
                                DependentField::with(
                                    dependentCondition: DependentFieldFilter::with(
                                        operator: 'eq',
                                        rangeEnd: 'rangeEnd',
                                        rangeStart: 'rangeStart',
                                        value: 'value',
                                        values: ['string'],
                                    ),
                                    dependentField: PhoneField::with(
                                        dependentFields: [],
                                        fieldType: 'phone',
                                        hidden: true,
                                        label: 'label',
                                        name: 'name',
                                        objectTypeID: 'objectTypeId',
                                        required: true,
                                        useCountryCodeSelect: true,
                                        validation: PhoneFieldValidation::with(
                                            maxAllowedDigits: 0,
                                            minAllowedDigits: 0
                                        ),
                                    )
                                        ->withDefaultValue('defaultValue')
                                        ->withDescription('description')
                                        ->withPlaceholder('placeholder'),
                                ),
                            ],
                            fieldType: 'email',
                            hidden: true,
                            label: 'label',
                            name: 'name',
                            objectTypeID: 'objectTypeId',
                            required: true,
                            validation: EmailFieldValidation::with(
                                blockedEmailDomains: ['string'],
                                useDefaultBlockList: true
                            ),
                        )
                            ->withDefaultValue('defaultValue')
                            ->withDescription('description')
                            ->withPlaceholder('placeholder'),
                    ],
                    groupType: 'default_group',
                    richTextType: 'text',
                )
                    ->withRichText('richText'),
            ],
            formType: 'hubspot',
            legalConsentOptions: LegalConsentOptionsNone::with(type: 'none'),
            name: 'name',
            updatedAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
