<?php

use App\Quotation;
use App\Proposal;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

/**
 * Carbon helper
 *
 * @param $time
 * @param $tz
 *
 * @return Carbon\Carbon
 */
function is_offer_made($partner_id = null, $quotation_id = null)
{
    $proposal_available = Proposal::where('partner_id', $partner_id)
        ->where('quotation_id', $quotation_id)->count();
    return $proposal_available;
}

function is_proposal_expired($proposal_id = null)
{
    $proposal = Proposal::where('id', $proposal_id)->first();
    $now = Carbon::now();
    $start_date = Carbon::parse($proposal->created_at);
    $end_date = Carbon::parse($proposal->valid_till);

    $flag = true;
    if ($now->between($start_date, $end_date)) {
        $flag = false; // Not Expired
    } else {
        $flag = true; // Expired
    }
    return $flag;
}
function carbon_format($timestamp, $format)
{
    $carbon_date = Carbon::parse($timestamp);
    $formatted_date = $carbon_date->format($format);
    return $formatted_date;
}

function send_proposal_mail($user_id, $quotation_id)
{
    $user = User::findOrFail($user_id);
    $to_name = $user->name;
    $to_email = $user->email;
    // $to_email = 'malickateeq@gmail.com';
    $proposals = Proposal::where('user_id', $user_id)
        ->where('status', 'active')
        ->where('quotation_id', $quotation_id)->with('vendor')->get()->toArray();

    $quotation = Quotation::findOrFail($quotation_id);

    $data = array(
        "proposals" => $proposals,
    );

    Mail::send('emails.proposal', $data, function ($message) use ($to_name, $to_email, $quotation) {
        $message->to($to_email, $to_name)
            ->subject('Proposals received related to Quotation#: ' . $quotation['id']);
        $message->from(
            env("MAIL_FROM_ADDRESS", "support@logistiquote.com"),   // Mail from email address
            'Quotation#' . $quotation['id'] . ' proposals | LogistiQuote'   // Title, Subject
        );
    });
}

function send_accept_proposal_mail($user_id, $partner_id, $quotation_id)
{
    $user = User::findOrFail($user_id)->toArray();
    $partner = User::findOrFail($partner_id)->toArray();
    $to_name = $partner['name'];
    $to_email = $partner['email'];
    // $to_email = 'malickateeq@gmail.com';
    $quotation = Quotation::findOrFail($quotation_id)->toArray();


    $data = array(
        "user" => $user,
        // "company_name" => "LogistiQuote", 
        // "email"=> "test@sdf.com", 
        // "additional_email" => "asd@ad.com", 
        // "phone" => "12345678", 
        // "body" => "Blah blah blah!"
    );

    Mail::send('emails.accept_proposal', $data, function ($message) use ($to_name, $to_email, $quotation) {
        $message->to($to_email, $to_name)
            ->subject('Proposals accepted of Quotation#: ' . $quotation['id']);
        $message->from(
            env("MAIL_FROM_ADDRESS", "support@logistiquote.com"),   // Mail from email address
            'Quotation#' . $quotation['id'] . '\'s proposal accepted | LogistiQuote'   // Title, Subject
        );
    });
}

function send_accept_proposal_mail2($user_id, $partner_id, $quotation_id)
{

    $user = User::findOrFail($user_id)->toArray();
    $partner = User::findOrFail($partner_id)->toArray();
    $to_name = "John Doe";
    // $to_email = "michael@logistiquote.com";
    $to_email = "michael@clc.org.il";
    // $to_email = 'malickateeq@gmail.com';
    $quotation = Quotation::findOrFail($quotation_id)->toArray();


    $data = array(
        "user" => $user,
        // "company_name" => "LogistiQuote", 
        // "email"=> "test@sdf.com", 
        // "additional_email" => "asd@ad.com", 
        // "phone" => "12345678", 
        // "body" => "Blah blah blah!"
    );

    Mail::send('emails.accept_proposal', $data, function ($message) use ($to_name, $to_email, $quotation) {
        $message->to($to_email, $to_name)
            ->subject('Proposals accepted of Quotation#: ' . $quotation['id']);
        $message->from(
            env("MAIL_FROM_ADDRESS", "support@logistiquote.com"),   // Mail from email address
            'Quotation#' . $quotation['id'] . '\'s proposal accepted | LogistiQuote'   // Title, Subject
        );
    });
}

function send_notify_user_mail($user_id, $partner_id, $quotation_id)
{
    $user = User::findOrFail($user_id)->toArray();
    $partner = User::findOrFail($partner_id)->toArray();
    $to_name = $user['name'];
    $to_email = $user['email'];
    // $to_email = 'malickateeq@gmail.com';
    $quotation = Quotation::findOrFail($quotation_id)->toArray();


    $data = array(
        "partner" => $partner,
        // "company_name" => "LogistiQuote", 
        // "email"=> "test@sdf.com", 
        // "additional_email" => "asd@ad.com", 
        // "phone" => "12345678", 
        // "body" => "Blah blah blah!"
    );

    Mail::send('emails.notify_user', $data, function ($message) use ($to_name, $to_email, $quotation) {
        $message->to($to_email, $to_name)
            ->subject('Quotation#: ' . $quotation['id'] . ' completion.');
        $message->from(
            env("MAIL_FROM_ADDRESS", "support@logistiquote.com"),   // Mail from email address
            'Quotation#' . $quotation['id'] . '\'s completed | LogistiQuote'   // Title, Subject
        );
    });
}


function notify_vendor_for_new_quotation_test($user_id, $quotation_id)
{

    // sleep(3);
    //  $user = User::findOrFail($user_id)->toArray();

    $partners = User::where('role', 'vendor')->get()->toArray();
    $quotation = Quotation::findOrFail($quotation_id)->toArray();



    foreach ($partners as $partner) {
        echo $partner['email'];
        $to_name = $partner['name'];
        $to_email = $partner['email'];

        $data = array(
            "quotation" => $quotation,
            // "company_name" => "LogistiQuote", 
            // "email"=> "test@sdf.com", 
            // "additional_email" => "asd@ad.com", 
            // "phone" => "12345678", 
            // "body" => "Blah blah blah!"
        );
        //  print_r($data);
        Mail::send('emails.quote_requested', $data, function ($message) use ($to_name, $to_email, $quotation) {
            $message->to($to_email, $to_name)
                ->subject($quotation['id'] . ': a user has just posted a quote.');
            $message->from(
                "supporting@logistiquote.com",   // Mail from email address
                'New quote requested by LogistiQuote user | LogistiQuote'   // Title, Subject
            );
        });
    }
}




function mailtest()
{
    $partners = User::where('role', 'vendor')->get()->toArray();
    //  dd($partners[4]['email']);

    $quotation = Quotation::findOrFail(131)->toArray();

    foreach ($partners as $partner) {
        $to_name = $partner['name'];
        $to_email = $partner['email'];
        $data = array(
            "quotation" => $quotation,
            // "company_name" => "LogistiQuote", 
            // "email"=> "test@sdf.com", 
            // "additional_email" => "asd@ad.com", 
            // "phone" => "12345678", 
            // "body" => "Blah blah blah!"
        );
        //  $to_email=$partners[4]['email'];
        //  $to_name='vteast';
        Mail::send('emails.quote_requested', $data, function ($message) use ($to_name, $to_email, $quotation) {
            $message->to($to_email, $to_name)
                ->subject('Mysubject');
            $message->from(
                //  env("MAIL_FROM_ADDRESS", "support@logistiquote.com"),   // Mail from email address
                'Test@logistiquote.com',
                'test'   // Title, Subject
            );
        });
    }

    /*  $partners = User::where('role', 'vendor')->get()->toArray();
    $quotation = Quotation::findOrFail($quotation_id)->toArray();

    foreach($partners as $partner)
    {
        $to_name = $partner['name'];
        $to_email = $partner['email'];
        
        $data = array(
                    "quotation" => $quotation,
                // "company_name" => "LogistiQuote", 
                // "email"=> "test@sdf.com", 
                // "additional_email" => "asd@ad.com", 
                // "phone" => "12345678", 
                // "body" => "Blah blah blah!"
            );
    
        Mail::send('emails.quote_requested', $data, function($message) use ($to_name, $to_email, $quotation) 
        {
            $message->to($to_email, $to_name)
            ->subject( $quotation['quotation_id'].': a user has just posted a quote.');
            $message->from(
                env("MAIL_FROM_ADDRESS", "support@logistiquote.com"),   // Mail from email address
                'New quote requested by LogistiQuote user | LogistiQuote'   // Title, Subject
            );
        });
    }*/
}


function send_message_about_register($user)
{
    $all_region = [
        'AD' => 'Andorra',
        'AE' => 'United Arab Emirates',
        'AF' => 'Afghanistan',
        'AG' => 'Antigua and Barbuda',
        'AI' => 'Anguilla',
        'AL' => 'Albania',
        'AM' => 'Armenia',
        'AO' => 'Angola',
        'AQ' => 'Antarctica',
        'AR' => 'Argentina',
        'AS' => 'American Samoa',
        'AT' => 'Austria',
        'AU' => 'Australia',
        'AW' => 'Aruba',
        'AX' => 'Åland Islands',
        'AZ' => 'Azerbaijan',
        'BA' => 'Bosnia and Herzegovina',
        'BB' => 'Barbados',
        'BD' => 'Bangladesh',
        'BE' => 'Belgium',
        'BF' => 'Burkina Faso',
        'BG' => 'Bulgaria',
        'BH' => 'Bahrain',
        'BI' => 'Burundi',
        'BJ' => 'Benin',
        'BL' => 'Saint Barthélemy',
        'BM' => 'Bermuda',
        'BN' => 'Brunei Darussalam',
        'BO' => 'Bolivia (Plurinational State of)',
        'BQ' => 'Bonaire, Sint Eustatius and Saba',
        'BR' => 'Brazil',
        'BS' => 'Bahamas',
        'BT' => 'Bhutan',
        'BV' => 'Bouvet Island',
        'BW' => 'Botswana',
        'BY' => 'Belarus',
        'BZ' => 'Belize',
        'CA' => 'Canada',
        'CC' => 'Cocos (Keeling) Islands',
        'CD' => 'Congo, Democratic Republic of the',
        'CF' => 'Central African Republic',
        'CG' => 'Congo',
        'CH' => 'Switzerland',
        'CI' => 'Côte d\'Ivoire',
        'CK' => 'Cook Islands',
        'CL' => 'Chile',
        'CM' => 'Cameroon',
        'CN' => 'China',
        'CO' => 'Colombia',
        'CR' => 'Costa Rica',
        'CU' => 'Cuba',
        'CV' => 'Cabo Verde',
        'CW' => 'Curaçao',
        'CX' => 'Christmas Island',
        'CY' => 'Cyprus',
        'CZ' => 'Czechia',
        'DE' => 'Germany',
        'DJ' => 'Djibouti',
        'DK' => 'Denmark',
        'DM' => 'Dominica',
        'DO' => 'Dominican Republic',
        'DZ' => 'Algeria',
        'EC' => 'Ecuador',
        'EE' => 'Estonia',
        'EG' => 'Egypt',
        'EH' => 'Western Sahara',
        'ER' => 'Eritrea',
        'ES' => 'Spain',
        'ET' => 'Ethiopia',
        'FI' => 'Finland',
        'FJ' => 'Fiji',
        'FK' => 'Falkland Islands (Malvinas)',
        'FM' => 'Micronesia (Federated States of)',
        'FO' => 'Faroe Islands',
        'FR' => 'France',
        'GA' => 'Gabon',
        'GB' => 'United Kingdom of Great Britain and Northern Ireland',
        'GD' => 'Grenada',
        'GE' => 'Georgia',
        'GF' => 'French Guiana',
        'GG' => 'Guernsey',
        'GH' => 'Ghana',
        'GI' => 'Gibraltar',
        'GL' => 'Greenland',
        'GM' => 'Gambia',
        'GN' => 'Guinea',
        'GP' => 'Guadeloupe',
        'GQ' => 'Equatorial Guinea',
        'GR' => 'Greece',
        'GS' => 'South Georgia and the South Sandwich Islands',
        'GT' => 'Guatemala',
        'GU' => 'Guam',
        'GW' => 'Guinea-Bissau',
        'GY' => 'Guyana',
        'HK' => 'Hong Kong',
        'HM' => 'Heard Island and McDonald Islands',
        'HN' => 'Honduras',
        'HR' => 'Croatia',
        'HT' => 'Haiti',
        'HU' => 'Hungary',
        'ID' => 'Indonesia',
        'IE' => 'Ireland',
        'IL' => 'Israel',
        'IM' => 'Isle of Man',
        'IN' => 'India',
        'IO' => 'British Indian Ocean Territory',
        'IQ' => 'Iraq',
        'IR' => 'Iran (Islamic Republic of)',
        'IS' => 'Iceland',
        'IT' => 'Italy',
        'JE' => 'Jersey',
        'JM' => 'Jamaica',
        'JO' => 'Jordan',
        'JP' => 'Japan',
        'KE' => 'Kenya',
        'KG' => 'Kyrgyzstan',
        'KH' => 'Cambodia',
        'KI' => 'Kiribati',
        'KM' => 'Comoros',
        'KN' => 'Saint Kitts and Nevis',
        'KP' => 'Korea (Democratic People\'s Republic of)',
        'KR' => 'Korea, Republic of',
        'KW' => 'Kuwait',
        'KY' => 'Cayman Islands',
        'KZ' => 'Kazakhstan',
        'LA' => 'Lao People\'s Democratic Republic',
        'LB' => 'Lebanon',
        'LC' => 'Saint Lucia',
        'LI' => 'Liechtenstein',
        'LK' => 'Sri Lanka',
        'LR' => 'Liberia',
        'LS' => 'Lesotho',
        'LT' => 'Lithuania',
        'LU' => 'Luxembourg',
        'LV' => 'Latvia',
        'LY' => 'Libya',
        'MA' => 'Morocco',
        'MC' => 'Monaco',
        'MD' => 'Moldova, Republic of',
        'ME' => 'Montenegro',
        'MF' => 'Saint Martin (French part)',
        'MG' => 'Madagascar',
        'MH' => 'Marshall Islands',
        'MK' => 'Macedonia, the former Yugoslav Republic of',
        'ML' => 'Mali',
        'MM' => 'Myanmar',
        'MN' => 'Mongolia',
        'MO' => 'Macao',
        'MP' => 'Northern Mariana Islands',
        'MQ' => 'Martinique',
        'MR' => 'Mauritania',
        'MS' => 'Montserrat',
        'MT' => 'Malta',
        'MU' => 'Mauritius',
        'MV' => 'Maldives',
        'MW' => 'Malawi',
        'MX' => 'Mexico',
        'MY' => 'Malaysia',
        'MZ' => 'Mozambique',
        'NA' => 'Namibia',
        'NC' => 'New Caledonia',
        'NE' => 'Niger',
        'NF' => 'Norfolk Island',
        'NG' => 'Nigeria',
        'NI' => 'Nicaragua',
        'NL' => 'Netherlands',
        'NO' => 'Norway',
        'NP' => 'Nepal',
        'NR' => 'Nauru',
        'NU' => 'Niue',
        'NZ' => 'New Zealand',
        'OM' => 'Oman',
        'PA' => 'Panama',
        'PE' => 'Peru',
        'PF' => 'French Polynesia',
        'PG' => 'Papua New Guinea',
        'PH' => 'Philippines',
        'PK' => 'Pakistan',
        'PL' => 'Poland',
        'PM' => 'Saint Pierre and Miquelon',
        'PN' => 'Pitcairn',
        'PR' => 'Puerto Rico',
        'PS' => 'Palestine, State of',
        'PT' => 'Portugal',
        'PW' => 'Palau',
        'PY' => 'Paraguay',
        'QA' => 'Qatar',
        'RE' => 'Réunion',
        'RO' => 'Romania',
        'RS' => 'Serbia',
        'RU' => 'Russian Federation',
        'RW' => 'Rwanda',
        'SA' => 'Saudi Arabia',
        'SB' => 'Solomon Islands',
        'SC' => 'Seychelles',
        'SD' => 'Sudan',
        'SE' => 'Sweden',
        'SG' => 'Singapore',
        'SH' => 'Saint Helena, Ascension and Tristan da Cunha',
        'SI' => 'Slovenia',
        'SJ' => 'Svalbard and Jan Mayen',
        'SK' => 'Slovakia',
        'SL' => 'Sierra Leone',
        'SM' => 'San Marino',
        'SN' => 'Senegal',
        'SO' => 'Somalia',
        'SR' => 'Suriname',
        'SS' => 'South Sudan',
        'ST' => 'Sao Tome and Principe',
        'SV' => 'El Salvador',
        'SX' => 'Sint Maarten (Dutch part)',
        'SY' => 'Syrian Arab Republic',
        'SZ' => 'Eswatini',
        'TC' => 'Turks and Caicos Islands',
        'TD' => 'Chad',
        'TF' => 'French Southern Territories',
        'TG' => 'Togo',
        'TH' => 'Thailand',
        'TJ' => 'Tajikistan',
        'TK' => 'Tokelau',
        'TL' => 'Timor-Leste',
        'TM' => 'Turkmenistan',
        'TN' => 'Tunisia',
        'TO' => 'Tonga',
        'TR' => 'Turkey',
        'TT' => 'Trinidad and Tobago',
        'TV' => 'Tuvalu',
        'TW' => 'Taiwan, Province of China',
        'TZ' => 'Tanzania, United Republic of',
        'UA' => 'Ukraine',
        'UG' => 'Uganda',
        'UM' => 'United States Minor Outlying Islands',
        'US' => 'United States of America',
        'UY' => 'Uruguay',
        'UZ' => 'Uzbekistan',
        'VA' => 'Holy See',
        'VC' => 'Saint Vincent and the Grenadines',
        'VE' => 'Venezuela (Bolivarian Republic of)',
        'VG' => 'Virgin Islands (British)',
        'VI' => 'Virgin Islands (U.S.)',
        'VN' => 'Viet Nam',
        'VU' => 'Vanuatu',
        'WF' => 'Wallis and Futuna',
        'WS' => 'Samoa',
        'YE' => 'Yemen',
        'YT' => 'Mayotte',
        'ZA' => 'South Africa',
        'ZM' => 'Zambia',
        'ZW' => 'Zimbabwe',
    ];
    $country = isset($all_region[$user['country']]) ? $all_region[$user['country']] : $user['country'];
    $user['country']=$country;
    $data = [
        'user' => $user,
    ];
    $to_name = 'Michael';
    $to_email = 'yii86@ukr.net';
    Mail::send('emails.register_user', $data, function ($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
            ->subject('Register New User');
        $message->from(
            env("MAIL_FROM_ADDRESS", "support@logistiquote.com"),   // Mail from email address
            'Notice Register User'   // Title, Subject
        );
    });
}




function notify_vendor_for_new_quotation($user_id, $quotation_id)
{
    // sleep(3);
    $user = User::findOrFail($user_id)->toArray();

    $partners = User::where('role', 'vendor')->get()->toArray();
    $quotation = Quotation::findOrFail($quotation_id)->toArray();

    foreach ($partners as $partner) {
        $to_name = $partner['name'];
        $to_email = $partner['email'];

        $data = array(
            "quotation" => $quotation,
            // "company_name" => "LogistiQuote", 
            // "email"=> "test@sdf.com", 
            // "additional_email" => "asd@ad.com", 
            // "phone" => "12345678", 
            // "body" => "Blah blah blah!"
        );

        Mail::send('emails.quote_requested', $data, function ($message) use ($to_name, $to_email, $quotation) {
            $message->to($to_email, $to_name)
                ->subject($quotation['id'] . ': a user has just posted a quote.');
            $message->from(
                env("MAIL_FROM_ADDRESS", "support@logistiquote.com"),   // Mail from email address
                'New quote requested by LogistiQuote user | LogistiQuote'   // Title, Subject
            );
        });
    }
}
