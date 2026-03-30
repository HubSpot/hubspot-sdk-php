<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\FieldTypeDefinition;

/**
 * Describes the field's type in the UI, with accepted values like booleancheckbox, calculation_equation, checkbox, date, file, html, number, phonenumber, radio, select, text, textarea, unknown.
 */
enum FieldType: string
{
    case BOOLEANCHECKBOX = 'booleancheckbox';

    case CALCULATION_EQUATION = 'calculation_equation';

    case CALCULATION_READ_TIME = 'calculation_read_time';

    case CALCULATION_ROLLUP = 'calculation_rollup';

    case CALCULATION_SCORE = 'calculation_score';

    case CHECKBOX = 'checkbox';

    case DATE = 'date';

    case FILE = 'file';

    case HTML = 'html';

    case NUMBER = 'number';

    case PHONENUMBER = 'phonenumber';

    case RADIO = 'radio';

    case SELECT = 'select';

    case TEXT = 'text';

    case TEXTAREA = 'textarea';

    case UNKNOWN = 'unknown';
}
