<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MailSetting
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MailSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MailSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MailSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|MailSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailSetting whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $mail_protocol
 * @property string $mail_library
 * @property string $encryption
 * @property int $mail_port
 * @property string $mail_host
 * @property string $mail_username
 * @property string $mail_password
 * @property string $mail_title
 * @property string $reply_to
 * @property int $email_verification
 * @property int $contact_messages
 * @property string $contact_mail
 * @property string $send_mail
 * @method static \Illuminate\Database\Eloquent\Builder|MailSetting whereContactMail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailSetting whereContactMessages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailSetting whereEmailVerification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailSetting whereEncryption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailSetting whereMailHost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailSetting whereMailLibrary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailSetting whereMailPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailSetting whereMailPort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailSetting whereMailProtocol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailSetting whereMailTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailSetting whereMailUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailSetting whereReplyTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailSetting whereSendMail($value)
 */
class MailSetting extends Model
{
    use HasFactory;

    protected $table = 'mail_settings';

    protected $fillable = [
        'encryption', 'mail_library', 'mail_protocol', 'mail_title', 'mail_password', 'mail_username', 'mail_port',
        'contact_messages', 'email_verification', 'reply_to', 'send_mail', 'mail_host',
    ];

    protected $appends = ['mailer_type'];

    const SMTP = 1;
    const MAIL_LOG = 2;
    const SENDGRID = 3;
    const TYPE = [
        self::SMTP     => 'SMTP',
        self::MAIL_LOG => 'MAIL_LOG',
        self::SENDGRID => 'SENDGRID',
    ];

    const SWIFT_MAILER = 1;
    const PHP_MAILER = 2;

    const LIBRARY_TYPE = [
        self::SWIFT_MAILER => 'SWIFT_MAILER',
        self::PHP_MAILER   => 'PHP_MAILER',
    ];

    const TLS = 1;
    const SSL = 2;

    const ENCRYPTION_TYPE = [
        self::TLS => 'TLS',
        self::SSL => 'SSL',
    ];

    const EMAIL_VERIFICATION_ACTIVE = 1;
    const EMAIL_VERIFICATION_DEACTIVE = 0;

    const CONTACT_MESSAGES_ACTIVE = 1;
    const CONTACT_MESSAGES_DEACTIVE = 0;

    public function getMailerTypeAttribute($value)
    {
        return self::TYPE[$this->mail_protocol];
    }

    public static $rules = [
        'encryption' => 'required',
        'mail_library' => 'required|max:190',
        'mail_protocol' => 'required',
        'mail_host'     => 'required|max:100',
        'mail_title'    => 'required|max:190',
        'mail_password' => 'required|min:6|max:190',
        'reply_to'      => 'required|email:filter|max:100',
        'mail_port'     => 'required|integer|min:1',
        'mail_username' => 'required|max:100',
        'contact_mail'  => 'nullable|email:filter',
    ];
}
