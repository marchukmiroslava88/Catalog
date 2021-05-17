<?php namespace OnlineStore\Catalog\Components;

use Db;
use Validator;
use ValidationException;
use ApplicationException;
use Exception;
use Cms\Classes\ComponentBase;
use OnlineStore\Catalog\Models\Callback as CallbackModel;
use OnlineStore\Catalog\Models\Settings;
use Illuminate\Support\Facades\Mail;

class Callback extends ComponentBase
{
    public $recaptcha;

    public function componentDetails()
    {
        return [
            'name'        => 'Callback Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    /**
     * onRun
     */
    public function onRun()
    {
        $this->recaptcha = $this->loadRecaptcha();
    }

    /**
     * loadRecaptcha
     */
    protected function loadRecaptcha()
    {
        return [
            'site_key' => Settings::get('site_key'),
            'lang'     => Settings::get('lang')
        ];
    }

    /**
     * onCallback
     */
    public function onCallback()
    {
        $data = request()->all();

        $validator = Validator::make($data, [
            'name' => 'required|min:3',
            'phone' => 'required|regex:#^380[0-9]{9}$#',
            'email' => 'required|email',
            'g-recaptcha-response' => 'required',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        Db::beginTransaction();
        try {
            $name  = trim($data['name']);
            $phone = trim($data['phone']);
            $email = trim($data['email']);

            $callback = CallbackModel::make();
            $callback->name = $name;
            $callback->phone = $phone;
            $callback->email = $email;
            $callback->save();

            Mail::sendTo($callback->email, 'onlinestore.catalog::mail.confirm', [
                'callback' => $callback
            ]);

        } catch (Exception $e) {
            Db::rollback();
            trace_log($e);
            throw new ApplicationException('Error. Please, try again later.');
        }
        Db::commit();
    }
}
