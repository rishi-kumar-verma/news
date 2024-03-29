<?php

namespace App\Repositories;

use App\Models\Setting;
use Illuminate\Support\Arr;

/**
 * Class UserRepository
 */
class SettingRepository extends BaseRepository
{
    public $fieldSearchable = [
        'application_name',
    ];
    /**
     * @inheritDoc
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * @inheritDoc
     */
    public function model()
    {
        return Setting::class;
    }

    /**
     * @param  array  $input
     *
     *
     * @return void
     */
    public function update($input,$userId)
    {
        $inputArr = Arr::except($input, ['_token']);
            
        if ($inputArr['sectionName'] == 'general') {
            $inputArr['application_name'] = (empty($inputArr['app_name'])) ? '' : $inputArr['app_name'];
            $inputArr['contact_no'] = (empty($inputArr['contact_no'])) ? '' : $inputArr['contact_no'];
            $inputArr['email'] = (empty($inputArr['email'])) ? '' : $inputArr['email'];
        }
        if ($inputArr['sectionName'] == 'general_1') {
            $inputArr['site_key'] = (empty($inputArr['site_key'])) ? '' : $inputArr['site_key'];
            $inputArr['secret_key'] = (empty($inputArr['secret_key'])) ? '' : $inputArr['secret_key'];
        }
        if ($inputArr['sectionName'] == 'contact_information') {
            $inputArr['contact_address'] = (empty($inputArr['contact_address'])) ? '' : $inputArr['contact_address'];
            $inputArr['about_text'] = (empty($inputArr['about_text'])) ? '' : $inputArr['about_text'];
        }
        
        if($inputArr['sectionName'] == 'cookie_warning')
        {
            $inputArr['cookie_warning'] = (!empty($inputArr['cookie_warning'])) ? $inputArr['cookie_warning'] : 
                'Your experience on this site will be improved by allowing cookies.' ;
        }

        foreach ($inputArr as $key => $value) {

            /** @var Setting $setting */
            $setting = Setting::where('key', $key)->first();
            if (! $setting) {
                continue;
            }

            $setting->update(['value' => $value]);

            if (in_array($key, ['logo']) && ! empty($value)) {
                $setting->clearMediaCollection(Setting::LOGO);
                $media = $setting->addMedia($value)->toMediaCollection(Setting::LOGO, config('app.media_disc'));
                $setting->update(['value' => $media->getUrl()]);
            }
            if (in_array($key, ['favicon']) && ! empty($value)) {
                $setting->clearMediaCollection(Setting::FAVICON);
                $media = $setting->addMedia($value)->toMediaCollection(Setting::FAVICON, config('app.media_disc'));
                $setting->update(['value' => $media->getUrl()]);
            }
        }
    }
}
